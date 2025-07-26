<?php

namespace App\Exports;

use App\Models\Panitia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class RekapPanitiaExport implements FromCollection, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Panitia::with(['pengguna', 'devisi', 'submission.fields'])
            ->orderBy('jenis')
            ->get()
            ->map(function ($item, $index) {
                // Ambil nama panitia berdasarkan jenis
                $nama = '-';
                if ($item->jenis === 'internal') {
                    $nama = $item->pengguna->nama ?? '-';
                } elseif ($item->jenis === 'eksternal') {
                    $nama = $item->submission?->fields?->firstWhere('field_name', 'nama_lengkap')?->value ?? '-';
                }

                return [
                    '', // Kolom A kosong
                    $index + 1,
                    $nama,
                    ucfirst($item->jenis),
                    $item->devisi->nama ?? '-',
                ];
            });

        // Header dan baris kosong awal
        return collect([
            array_fill(0, 5, ''), // Baris 1 kosong
            ['', 'No', 'Nama Panitia', 'Jenis', 'Devisi'], // Header
        ])->merge($data);
    }

    public function styles(Worksheet $sheet)
    {
        $rowCount = Panitia::count() + 2; // Baris header + baris kosong awal + data
        $dataRange = "B2:E{$rowCount}";

        // Gaya umum data dan border
        $sheet->getStyle($dataRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['argb' => 'FF4F81BD'],
                ],
            ],
            'alignment' => [
                'horizontal' => 'left',
                'vertical' => 'center',
                'wrapText' => true,
            ],
            'font' => [
                'name' => 'Calibri',
                'size' => 11,
            ],
        ]);

        // Gaya khusus header
        $sheet->getStyle('B2:E2')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => ['argb' => 'FF305496'],
                'endColor' => ['argb' => 'FF92CDDC'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        return [];
    }
}

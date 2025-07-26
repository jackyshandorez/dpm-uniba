<?php

namespace App\Exports;

use App\Models\Pengguna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PenggunaExport implements FromCollection, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        $data = Pengguna::with(['jabatan', 'jurusan'])->orderBy('jabatan_id')->get()->map(function ($item, $index) {
            return [
                '',
                $index + 1, // No (Kolom A)
                $item->nama,
                $item->email,
                $item->jabatan->nama_jabatan ?? 'Tidak Ada',
                $item->jurusan->nama ?? 'Tidak Ada',
                $item->angkatan,
                $item->nik,
                $item->telepon,
                $item->alamat,
                $item->tanggal_lahir,
                $item->jenis_kelamin,
                $item->status,
            ];
        });

        return collect([
            array_fill(0, 12, ''), // Baris 1 kosong, 13 kolom total (termasuk "No")
            [
                '','No', 'Nama', 'Email', 'Jabatan', 'Jurusan', 'Angkatan',
                'NIK', 'Telepon', 'Alamat', 'Tanggal Lahir', 'Jenis Kelamin', 'Status'
            ],
        ])->merge($data);
    }

    public function styles(Worksheet $sheet)
    {
        $rowCount = Pengguna::count() + 2; // Baris kosong + header + data

        $dataRange = "B2:M{$rowCount}"; // Kolom A sampai M (13 kolom total)

        // Style seluruh data + header
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

        // Style khusus untuk header (baris 2)
        $sheet->getStyle('B2:M2')->applyFromArray([
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

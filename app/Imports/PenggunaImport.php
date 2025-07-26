<?php

namespace App\Imports;

use App\Models\Pengguna;
use App\Models\Jabatan;
use App\Models\Jurusan;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class PenggunaImport implements ToModel, WithHeadingRow
{
    public $errors = [];
    protected $requiredColumns = [
        'nama', 'email', 'jabatan', 'jurusan',
        'angkatan', 'tanggal_lahir', 'jenis_kelamin', 'status'
    ];

    public function model(array $row)
    {
        // Cek kolom wajib
        foreach ($this->requiredColumns as $column) {
            if (!array_key_exists($column, $row)) {
                $this->errors[] = "Kolom \"$column\" tidak ditemukan di Excel.";
                return null;
            }
        }

        // Cek data wajib
        if (empty(trim($row['nama'] ?? ''))) {
            $this->errors[] = "Nama tidak boleh kosong di baris: " . json_encode($row);
            return null;
        }

        // Validasi relasi jabatan
        $jabatan = Jabatan::where('nama_jabatan', trim($row['jabatan'] ?? ''))->first();
        if (!$jabatan) {
            $this->errors[] = "Jabatan tidak ditemukan atau typo: \"{$row['jabatan']}\"";
        }

        // Validasi relasi jurusan
        $jurusan = Jurusan::where('nama', trim($row['jurusan'] ?? ''))->first();
        if (!$jurusan) {
            $this->errors[] = "Jurusan tidak ditemukan atau typo: \"{$row['jurusan']}\"";
        }

        // Tanggal lahir
        $tanggalLahir = $this->convertExcelDate($row['tanggal_lahir'] ?? null);

        return new Pengguna([
            'nama'           => $row['nama'] ?? null,
            'email'          => $row['email'] ?? null,
            'jabatan_id'     => $jabatan ? $jabatan->id : null,
            'jurusan_id'     => $jurusan ? $jurusan->id : null,
            'angkatan'       => $row['angkatan'] ?? null,
            'nik'            => $row['nik'] ?? null,
            'telepon'        => $row['telepon'] ?? null,
            'alamat'         => $row['alamat'] ?? null,
            'tanggal_lahir'  => $tanggalLahir,
            'jenis_kelamin'  => $row['jenis_kelamin'] ?? null,
            'status'         => $row['status'] ?? null,
        ]);
    }

    protected function convertExcelDate($value)
    {
        try {
            if (is_numeric($value)) {
                return Date::excelToDateTimeObject($value)->format('Y-m-d');
            }
            return \Carbon\Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            $this->errors[] = "Format tanggal_lahir tidak valid: \"{$value}\"";
            return null;
        }
    }
}

<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\Jabatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumniImport implements ToModel, WithHeadingRow
{
    public $errors = [];

    protected $requiredColumns = ['nama_alumni', 'jabatan', 'periode'];

    public function model(array $row)
    {
        // 🔍 Cek apakah semua kolom wajib tersedia
        foreach ($this->requiredColumns as $column) {
            if (!array_key_exists($column, $row)) {
                $this->errors[] = "Kolom \"$column\" tidak ditemukan.";
                return null;
            }
        }

        // 🚫 Cek jika nama kosong
        if (empty(trim($row['nama_alumni'] ?? ''))) {
            $this->errors[] = "Nama alumni tidak boleh kosong. Baris: " . json_encode($row);
            return null;
        }

        // 🚫 Cek jika periode kosong
        if (empty(trim($row['periode'] ?? ''))) {
            $this->errors[] = "Periode tidak boleh kosong. Baris: " . json_encode($row);
            return null;
        }

        // 🔍 Cari jabatan
        $jabatan = Jabatan::where('nama_jabatan', trim($row['jabatan'] ?? ''))->first();
        if (!$jabatan) {
            $this->errors[] = "Jabatan tidak ditemukan atau typo: \"{$row['jabatan']}\". Baris: " . json_encode($row);
            return null;
        }

        return new Alumni([
            'nama_alumni' => $row['nama_alumni'],
            'jabatan_id'  => $jabatan->id,
            'periode'     => $row['periode'],
        ]);
    }
}

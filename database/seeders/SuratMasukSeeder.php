<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuratMasuk;


class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            for ($i = 1; $i <= 10; $i++) {
            SuratMasuk::create([
                'nomor_surat'   => 'SM-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tanggal_surat' => now()->subDays(rand(1, 30))->format('Y-m-d'),
                'pengirim'      => 'Instansi ' . $i,
                'perihal'       => 'Perihal surat ke-' . $i,
                'file_lampiran' => 'lampiran/surat_' . $i . '.pdf',
                'status'        => 'baru',
            ]);
        }
    }
}

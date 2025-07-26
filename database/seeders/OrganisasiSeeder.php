<?php

namespace Database\Seeders;
use App\Models\Organisasi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organisasi = [
            ['nama' => 'Dewan Perwakilan Mahasiswa (DPM)', 'logo' => null],
            ['nama' => 'Badan Eksekutif Mahasiswa (BEM)', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Manajemen (HIMAMA)', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Akuntansi (HIMAKSI)', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Informatika (HIMATIF)', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Sistem Informasi (HIMASI)', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Teknik Industri (HMTI)', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Televisi, Film & Media (HMM)', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Hukum', 'logo' => null],
            ['nama' => 'Himpunan Mahasiswa Prodi Bahasa Asing (ELITE)', 'logo' => null],
        ];

        foreach ($organisasi as $org) {
            Organisasi::create($org);
    }
    }
}

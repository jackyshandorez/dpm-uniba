<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Devisi;

class KategoriDevisiSeeder extends Seeder
{
    public function run()
    {
        $devisi = [
            ['nama' => 'Ketua Pelaksana',     'warna' => '#FF5733'],
            ['nama' => 'Sekretaris',          'warna' => '#33C1FF'],
            ['nama' => 'Bendahara',           'warna' => '#33FF57'],
            ['nama' => 'Ketua Keacaraan',     'warna' => '#FF33B8'],
            ['nama' => 'Ketua Perlengkapan',  'warna' => '#A133FF'],
            ['nama' => 'Ketua Humas',         'warna' => '#FF8F33'],
            ['nama' => 'Ketua Konsumsi',      'warna' => '#33FFC4'],
            ['nama' => 'Keacaraan',           'warna' => '#FF3333'],
            ['nama' => 'Humas',               'warna' => '#337BFF'],
            ['nama' => 'Perlengkapan',        'warna' => '#33FFAA'],
            ['nama' => 'Konsumsi',            'warna' => '#C1FF33'],
        ];

        foreach ($devisi as $item) {
            Devisi::create($item);
        }
    }
}

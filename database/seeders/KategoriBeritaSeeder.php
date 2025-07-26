<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;
class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            'Pendidikan',
            'Event',
            'Pemerintahan',
            'Politik',
            'Hukum',
            'Sosial Budaya',
        ];

        foreach ($kategori as $nama) {
            KategoriBerita::create([
                'nama' => $nama,
                'slug' => Str::slug($nama),
            ]);
        }
    }
}

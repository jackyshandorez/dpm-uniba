<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
        public function run(): void
    {
        $data = [
            // Struktur Inti DPM
            ['nama' => 'Jeki Seryodi', 'email' => 'jeki@example.com', 'jabatan_id' => 1],
            ['nama' => 'Romeo Fandi Shah', 'email' => 'romeo@example.com', 'jabatan_id' => 2],
            ['nama' => 'Malihatul Munawwarah', 'email' => 'malih@example.com', 'jabatan_id' => 3],
            ['nama' => 'Kasifa Riana', 'email' => 'kasifa@example.com', 'jabatan_id' => 4],
            ['nama' => 'Febti Uliantini', 'email' => 'febti@example.com', 'jabatan_id' => 5],
            ['nama' => 'Sitti Nor Alinda', 'email' => 'alinda@example.com', 'jabatan_id' => 6],

            // Ketua Komisi
            ['nama' => 'Ach. Hidayaturrahman', 'email' => 'hidayat@example.com', 'jabatan_id' => 7],
            ['nama' => 'Muhammad Ihsan', 'email' => 'ihsan@example.com', 'jabatan_id' => 8],
            ['nama' => 'Moh Hilman Fahri Al Faridi', 'email' => 'hilman@example.com', 'jabatan_id' => 9],
            ['nama' => 'Kholik', 'email' => 'kholik@example.com', 'jabatan_id' => 10],

            // Komisi I
            ['nama' => 'Khalifatullah Layliyah', 'email' => 'khalifa@example.com', 'jabatan_id' => 14],
            ['nama' => 'Abdurrahman', 'email' => 'abdurrahman@example.com', 'jabatan_id' => 14],
            ['nama' => 'Helmy Ainun Munawaroh', 'email' => 'helmy@example.com', 'jabatan_id' => 14],

            // Komisi II
            ['nama' => 'Adi Prabowo', 'email' => 'adi@example.com', 'jabatan_id' => 15],
            ['nama' => 'Farah Arrovida Agustin', 'email' => 'farah@example.com', 'jabatan_id' => 15],
            ['nama' => 'Nur Imaniyah', 'email' => 'iman@example.com', 'jabatan_id' => 15],
            ['nama' => 'Junaidi', 'email' => 'junaidi@example.com', 'jabatan_id' => 15],
            ['nama' => 'Abelia Fitri', 'email' => 'abelia@example.com', 'jabatan_id' => 15],
            ['nama' => 'Nur Diana', 'email' => 'diana@example.com', 'jabatan_id' => 15],

            // Komisi III
            ['nama' => 'Nur Iga Maulina Putri', 'email' => 'iga@example.com', 'jabatan_id' => 16],
            ['nama' => 'Moh. Wafiq', 'email' => 'wafiq@example.com', 'jabatan_id' => 16],
            ['nama' => 'Nur Fadilah Alisatul Fitriyah', 'email' => 'fadilah@example.com', 'jabatan_id' => 16],
            ['nama' => 'Aida Magfiroh', 'email' => 'aida@example.com', 'jabatan_id' => 16],
            ['nama' => 'Sherly Khomariyah', 'email' => 'sherly@example.com', 'jabatan_id' => 16],

            // Komisi IV
            ['nama' => 'M. Rusly Al Farodis S', 'email' => 'rusly@example.com', 'jabatan_id' => 17],
            ['nama' => 'Merly Siska Handayani', 'email' => 'merly@example.com', 'jabatan_id' => 17],
        ];

        foreach ($data as $item) {
            Pengguna::create([
                'nama'           => $item['nama'],
                'email'          => $item['email'],
                'jabatan_id'     => $item['jabatan_id'],
                'jurusan_id'     => 1, // Sesuaikan jika perlu
                'angkatan'       => 2022,
                'nik'            => fake()->unique()->numerify('220231####'),
                'telepon'        => fake()->phoneNumber(),
                'alamat'         => 'Alamat Default',
                'foto'           => 'temp-pages/assets/img/contact/01.jpg',
                'status'         => 'aktif',
                'tanggal_lahir'  => fake()->date('Y-m-d', '2002-01-01'),
                'jenis_kelamin'  => fake()->randomElement(['Laki-laki', 'Perempuan']),
            ]);
        }
    }
}

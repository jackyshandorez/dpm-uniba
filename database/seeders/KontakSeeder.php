<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Kontak::create([
            'nama' => 'Dewan Perwakilan Mahasiswa Universitas KH. Bahaudin Mudhary Madura',
            'email' => 'dpmuniba@gmail.com',
            'whatsapp' => '082-337-943-657',
            'lokasi' => 'Jl. Raya Lenteng, Aredake, Batuan, Kec. Batuan, Kabupaten Sumenep, Jawa Timur 69451',
            'link_facebook' => 'https://facebook.com/dpm.uniba',
            'link_instagram' => 'https://www.instagram.com/dpmunibamadura?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            'link_youtube' => 'https://youtube.com/@dpm.uniba',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Komentar;

class KomentarSeeder extends Seeder
{
    public function run(): void
    {
        // Komentar utama
        $komentar1 = Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 1,
            'isi_komentar' => 'cara maennya gimana mbak',
            'parent_id' => null,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 2,
            'isi_komentar' => '@om joni ini yang suami mana .... yang istri mana 😭',
            'parent_id' => $komentar1->id,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 3,
            'isi_komentar' => '@om joni tinggal klik kanan bang 😂',
            'parent_id' => $komentar1->id,
        ]);

        $komentar2 = Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 4,
            'isi_komentar' => 'otw bawa piring 💃',
            'parent_id' => null,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 5,
            'isi_komentar' => '@F.i.t.r.i Mitsubishi aku udah bawa sendok 😆',
            'parent_id' => $komentar2->id,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 3,
            'isi_komentar' => 'anjir sama sama cewek cokkk 😂🤣',
            'parent_id' => null,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 2,
            'isi_komentar' => 'Keren banget 🤣',
            'parent_id' => null,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 1,
            'isi_komentar' => 'Otw bawa pot bunga 💐',
            'parent_id' => null,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 4,
            'isi_komentar' => 'Gas ramein 😄',
            'parent_id' => null,
        ]);

        Komentar::create([
            'berita_id' => 1,
            'public_user_id' => 5,
            'isi_komentar' => 'Beneran seru nih 😎',
            'parent_id' => null,
        ]);
    }
}

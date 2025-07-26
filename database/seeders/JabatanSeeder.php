<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
  public function run(): void
    {
        $data = [
            ['nama_jabatan' => 'Ketua', 'tanggung_jawab' => 'Memimpin dan mengkoordinasi seluruh kegiatan DPM'],
            ['nama_jabatan' => 'Wakil Ketua', 'tanggung_jawab' => 'Membantu dan menggantikan Ketua saat berhalangan'],
            ['nama_jabatan' => 'Sekretaris Jenderal I', 'tanggung_jawab' => 'Mengelola administrasi dan surat-menyurat'],
            ['nama_jabatan' => 'Sekretaris Jenderal II', 'tanggung_jawab' => 'Membantu Sekretaris Jenderal I dan dokumentasi internal'],
            ['nama_jabatan' => 'Badan Anggaran I', 'tanggung_jawab' => 'Menyusun anggaran kegiatan dan evaluasi keuangan'],
            ['nama_jabatan' => 'Badan Anggaran II', 'tanggung_jawab' => 'Membantu dan mengawasi pelaksanaan anggaran'],
            ['nama_jabatan' => 'Ketua Komisi I', 'tanggung_jawab' => 'Memimpin komisi dalam menyusun regulasi dan tata tertib DPM'],
            ['nama_jabatan' => 'Anggota Komisi I', 'tanggung_jawab' => 'Membahas dan merancang produk hukum DPM. Mengawasi penerapan peraturan internal'],
            ['nama_jabatan' => 'Ketua Komisi II', 'tanggung_jawab' => 'Memimpin upaya perlindungan hak mahasiswa'],
            ['nama_jabatan' => 'Anggota Komisi II', 'tanggung_jawab' => 'Menyalurkan aspirasi mahasiswa. Menjembatani mahasiswa dengan pihak kampus'],
            ['nama_jabatan' => 'Ketua Komisi III', 'tanggung_jawab' => 'Bertanggung jawab atas pengawasan kegiatan Ormawa'],
            ['nama_jabatan' => 'Anggota Komisi III', 'tanggung_jawab' => 'Mengevaluasi kinerja BEM dan UKM. Memonitor pelaksanaan program kerja'],
            ['nama_jabatan' => 'Ketua Komisi IV', 'tanggung_jawab' => 'Mengkoordinasi publikasi & komunikasi eksternal DPM'],
            ['nama_jabatan' => 'Anggota Komisi IV', 'tanggung_jawab' => 'Mengelola media sosial dan dokumentasi. Menyalurkan informasi ke mahasiswa secara efektif'],
        ];

        foreach ($data as $item) {
            Jabatan::updateOrCreate(
                ['nama_jabatan' => $item['nama_jabatan']],
                ['tanggung_jawab' => $item['tanggung_jawab']]
            );
        }
    }
}

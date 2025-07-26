<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up(): void
    {
        Schema::create('panitia', function (Blueprint $table) {
            $table->id();

            // Kolom relasi ke pengguna (internal)
            $table->foreignId('pengguna_id')->nullable()->constrained('pengguna')->onDelete('cascade');

            // Kolom relasi ke submission (eksternal)
            $table->foreignId('submission_id')->nullable()->constrained('rekrutmen_submissions')->onDelete('cascade');

            // Kolom relasi ke form
            $table->foreignId('form_id')->constrained('rekrutmen_forms')->onDelete('cascade');

            // Kolom relasi ke devisi
            $table->foreignId('devisi_id')->constrained('kategori_devisi')->onDelete('cascade');

            // Tipe panitia
            $table->enum('jenis', ['internal', 'eksternal']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panitia');
    }
};

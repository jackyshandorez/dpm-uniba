<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nama');
        });
    }

    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });
    }

};

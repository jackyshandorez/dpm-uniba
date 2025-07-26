<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori_devisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('warna')->nullable(); // warna garis, misalnya #FF5733
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_devisi');
    }
};

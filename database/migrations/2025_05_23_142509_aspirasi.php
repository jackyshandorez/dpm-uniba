<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nim')->nullable();
            $table->string('jurusan');
            $table->tinyInteger('semester')->nullable();
            $table->string('judul_aspirasi');
            $table->text('isi_aspirasi');
            $table->boolean('anonim')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aspirasi');
    }

};

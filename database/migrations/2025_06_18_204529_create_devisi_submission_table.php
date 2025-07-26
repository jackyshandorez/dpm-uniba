<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('devisi_submission', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('submission_id');
    $table->unsignedBigInteger('devisi_id');
    $table->timestamps();

    $table->foreign('submission_id')->references('id')->on('rekrutmen_submissions')->onDelete('cascade');
    $table->foreign('devisi_id')->references('id')->on('kategori_devisi')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devisi_submission');
    }
};

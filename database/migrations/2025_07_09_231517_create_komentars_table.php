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
    Schema::create('komentars', function (Blueprint $table) {
        $table->id();
        $table->foreignId('berita_id')->constrained()->onDelete('cascade');
        $table->foreignId('public_user_id')->constrained()->onDelete('cascade');
        $table->text('isi_komentar');
        $table->foreignId('parent_id')->nullable()->constrained('komentars')->onDelete('cascade'); // self reference
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};

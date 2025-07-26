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
    Schema::create('rekrutmen_submission_fields', function (Blueprint $table) {
        $table->id();
        $table->foreignId('submission_id')->constrained('rekrutmen_submissions')->onDelete('cascade');
        $table->string('field_name');
        $table->text('value');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekrutmen_submission_fields');
    }
};

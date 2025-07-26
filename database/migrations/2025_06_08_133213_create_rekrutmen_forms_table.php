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
            Schema::create('rekrutmen_forms', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->text('deskripsi')->nullable();
                $table->enum('status', ['buka', 'tutup'])->default('tutup');
                $table->date('batas_akhir')->nullable();
                $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('rekrutmen_forms');
        }
    };

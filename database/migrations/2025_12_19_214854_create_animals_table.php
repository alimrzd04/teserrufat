<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('animal_type_id')
                ->constrained('animal_types');

            $table->foreignId('breed_id')
                ->nullable()
                ->constrained('breeds');

            $table->enum('gender', ['erkək', 'dişi', 'bilinmir'])->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('age')->nullable();
            $table->string('city', 100)->nullable();
            $table->text('description')->nullable();

            $table->timestamps();

            $table->index(['user_id']);
            $table->index(['animal_type_id']);
            $table->index(['breed_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};

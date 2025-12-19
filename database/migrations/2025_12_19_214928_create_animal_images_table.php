<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animal_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('animal_id')
                ->constrained('animals')
                ->cascadeOnDelete();

            $table->text('image_url');
            $table->integer('order_index')->default(0);

            $table->timestamps();

            $table->index('animal_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_images');
    }
};

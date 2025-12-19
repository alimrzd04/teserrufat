<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animal_property_values', function (Blueprint $table) {
            $table->id();

            $table->foreignId('animal_id')
                ->constrained('animals')
                ->cascadeOnDelete();

            $table->foreignId('property_id')
                ->constrained('animal_properties')
                ->cascadeOnDelete();

            $table->text('value_text')->nullable();
            $table->decimal('value_number', 12, 2)->nullable();
            $table->boolean('value_boolean')->nullable();

            $table->timestamps();

            $table->unique(['animal_id', 'property_id']);
            $table->index('animal_id');
            $table->index('property_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_property_values');
    }
};

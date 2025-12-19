<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animal_type_properties', function (Blueprint $table) {
            $table->id();

            $table->foreignId('animal_type_id')
                ->constrained('animal_types')
                ->cascadeOnDelete();

            $table->foreignId('property_id')
                ->constrained('animal_properties')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['animal_type_id', 'property_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_type_properties');
    }
};

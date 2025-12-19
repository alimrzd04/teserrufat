<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animal_properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_key', 100)->unique();
            $table->enum('data_type', ['text', 'number', 'boolean']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_properties');
    }
};

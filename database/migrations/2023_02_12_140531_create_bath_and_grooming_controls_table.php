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
        Schema::create('bath_and_grooming_controls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_reference_id')->nullable();
            $table->foreignId('pet_id')->constrained();
            $table->foreignId('bath_and_grooming_plan_id')->nullable();
            $table->decimal('value', 8, 2);
            $table->integer('baths_number_plan')->nullable();
            $table->integer('baths_number_used')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bath_and_grooming_controls');
    }
};

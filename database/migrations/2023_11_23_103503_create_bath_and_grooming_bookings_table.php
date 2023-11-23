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
        Schema::create('bath_and_grooming_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_reference_id')->nullable();
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('bath_and_grooming_control_id')->nullable();
            $table->unsignedBigInteger('bather')->nullable();
            $table->decimal('service_value', 8, 2);
            $table->date('bath_date');
            $table->time('bath_time');
            $table->text('bath_type');
            $table->text('bath_complement');
            $table->text('extra_services')->nullable();
            $table->text('notes')->nullable();
            $table->text('bather_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bath_and_grooming_bookings');
    }
};

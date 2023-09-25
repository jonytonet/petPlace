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
        Schema::create('daycare_monthly_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daycare_enrollment_id');
            $table->unsignedBigInteger('service_reference_id')->nullable();
            $table->date('pay_day');
            $table->integer('reference_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daycare_monthly_payments');
    }
};

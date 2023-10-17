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
        Schema::create('daycare_daily_credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daycare_enrollment_id');
            $table->integer('daily_credit');
            $table->date('validity');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daycare_daily_credits');
    }
};

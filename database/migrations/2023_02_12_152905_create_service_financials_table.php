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
        Schema::create('service_financials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_reference_id')->constrained('service_references');
            $table->foreignId('service_type_id')->constrained()->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->decimal('service_value', 8, 2);
            $table->foreignId('payment_method_id')->constrained();
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('additional_expenses', 8, 2)->nullable();
            $table->decimal('commission_value', 8, 2)->nullable();
            $table->unsignedBigInteger('commission_by')->nullable();
            $table->decimal('net_total', 8, 2)->nullable();
            $table->boolean('is_paid')->default(false);
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_financials');
    }
};

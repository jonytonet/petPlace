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
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf')->nullable()->after('email');
            $table->string('rg')->nullable()->after('cpf');
            $table->string('gender')->nullable()->after('rg');
            $table->string('cellphone_number')->nullable()->after('gender');
            $table->string('phone_number')->nullable()->after('cellphone_number');
            $table->string('alternate_contact_name')->nullable()->after('phone_number');
            $table->string('alternate_contact_cellphone_number')->nullable()->after('alternate_contact_name');
            $table->unsignedBigInteger('user_type_id')->after('password')->nullable();
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_type_id']);
            $table->dropColumn('user_type_id');
            $table->dropColumn('alternate_contact_cellphone_number');
            $table->dropColumn('alternate_contact_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('cellphone_number');
            $table->dropColumn('gender');
            $table->dropColumn('rg');
            $table->dropColumn('cpf');
        });
    }
};

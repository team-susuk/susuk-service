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
            $table->foreignId('province_id')->nullable()->references('id')->on('provinces')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->nullOnDelete();
            $table->foreignId('subdistrict_id')->nullable()->references('id')->on('subdistricts')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('city_id');
            $table->dropColumn('subdistrict_id');
        });
    }
};

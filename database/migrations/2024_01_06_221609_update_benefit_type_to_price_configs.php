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
        Schema::table('price_configs', function (Blueprint $table) {
            $table->integer('benefit_value')->nullable()->change();
            $table->enum("benefit_type", ["day", "month", "product"])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('price_configs', function (Blueprint $table) {
            $table->integer('benefit_value')->change();
            $table->enum("benefit_type", ["day", "month", "product"])->change();
        });
    }
};

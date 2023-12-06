<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('nick_name');
            $table->string('birthday');
            $table->string('phone_number', 20);
            $table->string('profile');
            $table->foreignId('profession_id')->nullable()->references('id')->on('professions')->nullOnDelete();
            $table->json('languages')->nullable()->comment("EX : ['Indonesia','Jepang']");
            $table->string('password');
            $table->enum('status', ['waiting_approval', 'rejected', 'active', 'non_active'])->default('waiting_approval');
            $table->dateTime('register_at');
            $table->dateTime('verification_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

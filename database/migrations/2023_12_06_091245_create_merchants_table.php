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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('profile');
            $table->text('description');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->nullOnDelete();
            $table->foreignId('province_id')->nullable()->references('id')->on('provinces')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->nullOnDelete();
            $table->foreignId('subdistrict_id')->nullable()->references('id')->on('subdistricts')->nullOnDelete();
            $table->text('address');
            $table->string('pic_name');
            $table->string('phone_number', 20);
            $table->string('whatsapp_number', 20);
            $table->json('commission')->nullable()->comment("{'start':10,'end':10}");
            $table->json('weekdays')->nullable()->comment("['Senin','Selasa']");
            $table->json('weekday_time')->nullable()->comment("{'start':'08:00','end':'13:00'}");
            $table->json('weekends')->nullable()->comment("['Senin','Selasa']");
            $table->json('weekend_time')->nullable()->comment("{'start':'08:00','end':'13:00'}");
            $table->string('siup_document')->nullable();
            $table->integer('viewer')->default(0)->comment('increment if guest see profile');
            $table->boolean('is_member')->default(false);
            $table->dateTime('expired_member_at')->nullable();
            $table->string('code');
            $table->string('password');
            $table->dateTime('register_at');
            $table->dateTime('verification_at')->nullable();
            $table->enum('status', ['waiting_approval', 'rejected', 'active', 'non_active'])->default('waiting_approval');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};

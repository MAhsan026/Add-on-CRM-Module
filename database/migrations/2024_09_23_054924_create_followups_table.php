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
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('contact_id')->constrained('contacts');
            $table->dateTime('date_time');
            $table->string('email');
            $table->enum('type', ['email', 'sms', 'meeting']);
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->enum('notification_type', ['email', 'sms'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followups');
    }
};

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
        Schema::create('compaign_contacts', function (Blueprint $table) {
            $table->foreignId('campaign_id')->constrained('compaigns');
            $table->foreignId('contact_id')->constrained('contacts');
            $table->primary(['campaign_id', 'contact_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compaign_contacts');
    }
};

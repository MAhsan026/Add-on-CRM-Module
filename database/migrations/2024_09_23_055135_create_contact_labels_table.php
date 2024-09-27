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
        Schema::create('contact_labels', function (Blueprint $table) {
            $table->foreignId('contact_id')->constrained('contacts');
            $table->foreignId('label_id')->constrained('labels');
            $table->primary(['contact_id', 'label_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_labels');
    }
};

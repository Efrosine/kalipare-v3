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
        Schema::create('family_cards', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('card_number')->unique(); // Nomor KK, harus unik
            $table->string('head_of_family_name');
            $table->string('street_address');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('postal_code', 5);
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_cards');
    }
};

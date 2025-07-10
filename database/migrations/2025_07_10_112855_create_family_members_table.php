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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->string('family_card_number'); // Foreign key
            $table->string('national_id_number')->unique(); // NIK
            $table->string('name');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('blood_type')->nullable();
            $table->string('religion');
            $table->string('marital_status');
            $table->string('family_relationship_status');
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('fathers_name')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            // Ini akan menghubungkan 'family_card_number' ke 'card_number' di tabel 'family_cards'
            $table->foreign('family_card_number')
                ->references('card_number')
                ->on('family_cards')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};

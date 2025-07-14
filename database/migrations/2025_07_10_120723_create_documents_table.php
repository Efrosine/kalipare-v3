<?php

use App\Models\Signatory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DocumentType;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_id');
            $table->foreignIdFor(DocumentType::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Signatory::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('additional_data')->nullable();
            $table->string('purpose')->nullable();
            $table->date('signature_date')->default(now());
            $table->timestamps();

            $table->foreign('applicant_id')->references('national_id_number')->on('family_members')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};

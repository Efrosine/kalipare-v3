<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Document extends Model
{
    protected $fillable = [
        "applicant_id",
        "document_type_id",
        "additional_data",
        "purpose",
        "signature_date",
        "signatory_id", // Added signatory_id to fillable
    ];

    protected $casts = [
        'additional_data' => 'array', // Automatically cast JSON to array

    ];

    protected function signatureDate(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // Handle both Carbon instances and string values
                if ($value instanceof Carbon) {
                    return $value->translatedFormat('d F Y');
                }
                return $value ? Carbon::parse($value)->translatedFormat('d F Y') : '-';
            },
            set: fn($value) => $value ? Carbon::parse($value) : now(),
        );
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(FamilyMember::class, 'applicant_id', 'national_id_number');
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function signatory(): BelongsTo
    {
        return $this->belongsTo(Signatory::class);
    }
}

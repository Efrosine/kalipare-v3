<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Date;


class FamilyMember extends Model
{
    protected $fillable = [
        'family_card_number',
        'national_id_number',
        'name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'blood_type',
        'religion',
        'marital_status',
        'family_relationship_status',
        'education',
        'occupation',
        'mothers_name',
        'fathers_name',
    ];

    // Mutators and accessors for string fields using Attribute class
    protected function nationalIdNumber(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => strtoupper($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value === 'l' ? 'Laki-Laki' : ($value === 'p' ? 'Perempuan' : ucfirst($value)),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function placeOfBirth(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function bloodType(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => $value ? strtolower($value) : null,
        );
    }

    protected function religion(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function maritalStatus(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function familyRelationshipStatus(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function education(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => $value ? strtolower($value) : null,
        );
    }

    protected function occupation(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => $value ? strtolower($value) : null,
        );
    }

    protected function mothersName(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => $value ? strtolower($value) : null,
        );
    }

    protected function fathersName(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => $value ? strtolower($value) : null,
        );
    }

    protected function familyCardNumber(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => strtolower($value),
        );
    }

    // Age accessor using the Attribute class for consistency
    protected function age(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->date_of_birth) {
                    return 0;
                }

                try {
                    // Simple integer age calculation - just return the whole years
                    $birthDate = $this->getRawOriginal('date_of_birth'); // Get raw date from database
                    return (int) Carbon::parse($birthDate)->diffInYears(Carbon::now());
                } catch (\Exception $e) {
                    return 0;
                }
            }
        );
    }

    protected function dateOfBirth(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$value) {
                    return '-';
                }

                try {
                    // Set locale to Indonesian for translated month names
                    Carbon::setLocale('id');
                    // Format the date in Indonesian format
                    return Carbon::parse($value)->translatedFormat('d F Y');
                } catch (\Exception $e) {
                    return $value; // Return original if parsing fails
                }
            },
            set: function ($value) {
                if (!$value) {
                    return null;
                }

                // If it's already a Carbon instance, use it directly
                if ($value instanceof Carbon) {
                    return $value->format('Y-m-d');
                }

                try {
                    // Standard parsing should work for SQL date format (YYYY-MM-DD)
                    return Carbon::parse($value)->format('Y-m-d');
                } catch (\Exception $e) {
                    return null;
                }
            },
        );
    }

    public function familyCard(): BelongsTo
    {
        return $this->belongsTo(FamilyCard::class, 'family_card_number', 'card_number');
    }
}

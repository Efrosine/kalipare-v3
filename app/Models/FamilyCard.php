<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Str;

class FamilyCard extends Model
{
    protected $fillable = [
        'card_number',
        'head_of_family_name',
        'street_address',
        'rt',
        'rw',
        'postal_code',
        'phone_number',
    ];

    // Mutators and accessors for string fields using Attribute class
    protected function cardNumber(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function headOfFamilyName(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => strtoupper($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function streetAddress(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function rt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function rw(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function postalCode(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function phoneNumber(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn(string $value) => $value ? strtolower($value) : '-',
        );
    }

    public function familyMembers(): HasMany
    {
        return $this->hasMany(FamilyMember::class, 'family_card_number', 'card_number');
    }

    public function fullAddress(): string
    {
        $formatedStreetAddress = trim($this->street_address);
        // Mengembalikan alamat lengkap dengan format yang diinginkan
        return "{$formatedStreetAddress}, RT {$this->rt}/RW {$this->rw}, Desa Kalipare, Kecamatan Kalipare, Kabupaten Malang";
    }
}

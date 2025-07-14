<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Signatory extends Model
{
    protected $fillable = [
        'signatory_name',
        'signatory_position',
    ];

    // Mutator and accessor for signatory name using Attribute class
    protected function signatoryName(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => strtoupper($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    // Mutator and accessor for signatory position using Attribute class
    protected function signatoryPosition(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value),
            set: fn(string $value) => strtolower($value),
        );
    }
}

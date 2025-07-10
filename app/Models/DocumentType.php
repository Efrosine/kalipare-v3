<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    protected $fillable = [
        'type_name',
        'number_registration',
        'form_structure',
        'template',
    ];

    protected $casts = [
        'form_structure' => 'array', // Automatically cast JSON to array
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}

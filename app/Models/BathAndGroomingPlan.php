<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BathAndGroomingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'pet_species',
        'fur_type',
        'max_weight',
        'price',
        'baths_number',
        'max_use_months',
    ];

    public function pets()
    {
        return $this->belongsToMany(Pet::class)->withTimestamps();
    }
    public function petSpecies(): BelongsTo
    {
        return $this->belongsTo(Specie::class, 'pet_species', 'id');
    }

}

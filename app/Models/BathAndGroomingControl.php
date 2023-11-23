<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BathAndGroomingControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_reference_id',
        'pet_id',
        'bath_and_grooming_plan_id',
        'value',
        'baths_number_plan',
        'baths_number_used',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function bathAndGroomingPlan()
    {
        return $this->belongsTo(BathAndGroomingPlan::class);
    }
}

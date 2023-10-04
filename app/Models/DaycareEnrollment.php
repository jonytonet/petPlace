<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DaycareEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'daycare_plan_id',
        'initial_date_plan',
        'active',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function daycarePlan()
    {
        return $this->belongsTo(DaycarePlan::class);
    }

    public function daycareMonthlyPayment(): HasMany
    {
        return $this->hasMany(DaycareMonthlyPayment::class)->orderBy('id', 'DESC');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BathAndGroomingBooking extends Model
{
    use HasFactory;

    protected $fillable = [

        'service_reference_id',
        'pet_id',
        'bath_and_grooming_control_id',
        'bather',
        'service_value',
        'bath_date',
        'bath_time',
        'bath_type',
        'bath_complement',
        'extra_services',
        'notes',
        'bather_notes',

    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    public function bathAndGroomingPlan(): BelongsTo
    {
        return $this->belongsTo(BathAndGroomingPlan::class);
    }

    public function bather(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bather', 'id');
    }
}

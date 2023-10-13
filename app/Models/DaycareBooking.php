<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaycareBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'daycare_enrollment_id',
        'date',
        'entry_time',
        'exit_time',
        'extra_time',
        'lunch_time',
        'is_single_daily',
        'notes',
    ];

    public function daycareEnrollment()
    {
        return $this->belongsTo(DaycareEnrollment::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}

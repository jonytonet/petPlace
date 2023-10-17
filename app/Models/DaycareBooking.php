<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
        'period',
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

    public function isLate()
    {
        $forecast = Carbon::createFromFormat('H:i:s', $this->entry_time)
            ->addHours($this->period);

        $now = Carbon::now();

        return $now->gt($forecast);
    }

    public function getDelayInMinutes()
    {
        $forecast = Carbon::createFromFormat('H:i:s', $this->entry_time)
            ->addHours($this->period);
        $now = Carbon::now();
        $delayInMinutes = $now->diffInMinutes($forecast);

        return $delayInMinutes;
    }
}

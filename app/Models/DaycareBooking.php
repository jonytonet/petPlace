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

    public function isLate(): bool
    {
        $forecast = Carbon::createFromFormat('H:i:s', $this->entry_time)
            ->addHours($this->period);

        $now = Carbon::now();

        if ($now->hour >= 19) {
            return true;
        }

        return $now->gt($forecast);
    }

    public function getDelayInMinutes(): int
    {
        $forecast = Carbon::createFromFormat('H:i:s', $this->entry_time)
            ->addHours($this->period);
        $now = Carbon::now();

        $delayInMinutes = $now->diffInMinutes($forecast);

        if ($delayInMinutes <= 0 && $now->hour >= 19) {
            $forecast = Carbon::createFromTime(19, 0, 0);
            $delayInMinutes = $now->diffInMinutes($forecast);
        }

        return $delayInMinutes;
    }

    public function getCheckOutTime()
    {
        $now = Carbon::now();

        if ($now->hour >= 19) {
            return Carbon::createFromTime(19, 0, 0)->format('H:i:s');
        }

        $forecast = Carbon::createFromFormat('H:i:s', $this->entry_time)
            ->addHours($this->period);

        if ($forecast->hour >= 19 || $forecast->hour <= 7) {
            $forecast = Carbon::createFromTime(19, 0, 0);

        }

        return $forecast->format('H:i:s');
    }
}

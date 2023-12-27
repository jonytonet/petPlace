<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DaycareDailyCredit extends Model
{
    use HasFactory;

    protected $fillable = ['daycare_enrollment_id', 'daily_credit', 'validity', 'type'];

    public function daycareEnrollment(): BelongsTo
    {
        return $this->belongsTo(DaycareEnrollment::class);
    }
}

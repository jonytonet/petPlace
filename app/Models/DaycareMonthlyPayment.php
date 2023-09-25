<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DaycareMonthlyPayment extends Model
{
    use HasFactory;

    public $fillable = [
        'daycare_enrollment_id',
        'service_reference_id',
        'pay_day',
        'reference_month',
    ];

    public function daycareEnrollment(): BelongsTo
    {
        return $this->belongsTo(DaycareEnrollment::class);
    }

    public function serviceReference(): BelongsTo
    {
        return $this->belongsTo(ServiceReference::class);
    }
}

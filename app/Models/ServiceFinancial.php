<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFinancial extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_reference_id',
        'service_type_id',
        'service_value',
        'payment_method_id',
        'discount',
        'additional_expenses',
        'commission_value',
        'commission_by',
        'net_total',
    ];

    public function serviceReference()
    {
        return $this->belongsTo(ServiceReference::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function commissionBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'commission_by', 'id');
    }
}

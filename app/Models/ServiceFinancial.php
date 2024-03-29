<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFinancial extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_reference_id',
        'user_id',
        'service_type_id',
        'service_value',
        'payment_method_id',
        'discount',
        'additional_expenses',
        'commission_value',
        'commission_by',
        'net_total',
        'is_paid',
        'due_date',
    ];

    protected function dueDate(): Attribute
    {
        return Attribute::make(
            set: function (string $value) {
                return $value ?: now()->format('Y-m-d');
            }
        );
    }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

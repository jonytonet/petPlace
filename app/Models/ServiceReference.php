<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceReference extends Model
{
    use HasFactory;

    protected $fillable = ['reference'];

    public static function generateServiceReference()
    {
        $year = date('Y');
        $month = date('m');
        $whereDate = date('Y-m') . '%';
        $sequence = ServiceReference::whereDate('created_at', 'LIKE', $whereDate)->count() + 1;
        $sequence = str_pad($sequence, 4, '0', STR_PAD_LEFT);
        return $year . 'SLPS' . $sequence . $month;
    }

    public function serviceFinancial(): HasOne
    {
        return $this->hasOne(ServiceFinancial::class, 'id', 'service_reference_id');
    }
}

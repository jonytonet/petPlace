<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceReference extends Model
{
    use HasFactory;

    protected $fillable = ['reference'];

    public function generateServiceReference()
    {
        $year = date('Y');
        $sequence = $this->count() + 1; // Obtém o próximo número sequencial
        $sequence = str_pad($sequence, 4, '0', STR_PAD_LEFT); // Adiciona zeros à esquerda

        return $year.'SLPS'.$sequence; // Concatena o prefixo com o número sequencial
    }

    public function serviceFinancial(): HasOne
    {
        return $this->hasOne(ServiceFinancial::class, 'id', 'service_reference_id');
    }
}

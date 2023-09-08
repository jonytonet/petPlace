<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'specie_id',
        'name',
        'description',
    ];

    public function specie():BelongsTo
    {
        return $this->belongsTo(Specie::class);
    }
}

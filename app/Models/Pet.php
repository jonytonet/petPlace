<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'name',
        'specie_id',
        'breed_id',
        'gender',
        'date_of_birth',
        'fur',
        'size',
        'microchip',
    ];

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::title($value),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function vaccines()
    {
        return $this->hasMany(Vaccine::class);
    }

    public function dewormers()
    {
        return $this->hasMany(Dewormer::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}

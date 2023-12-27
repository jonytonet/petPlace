<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Validator;
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

    public static function validate($pet): array
    {
        $attributes = is_object($pet) ? (array) $pet : $pet;

        $validator = Validator::make($attributes, [
            'user_id' => 'required',
            'name' => 'required',
            'specie_id' => 'required',
            'breed_id' => 'required',
            'gender' => 'required',
            'fur' => 'required',
            'size' => 'required',
        ], [
            'user_id.required' => 'O campo Tutor é obrigatório.',
            'name.required' => 'O campo Nome é obrigatório.',
            'specie_id.required' => 'O campo Espécie é obrigatório.',
            'breed_id.required' => 'O campo Raça é obrigatório.',
            'gender.required' => 'O campo Gênero é obrigatório.',
            'fur.required' => 'O campo Pelagem é obrigatório.',
            'size.required' => 'O campo Tamanho é obrigatório.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return [
                'status' => 'error',
                'msg' => $errors,
            ];
        }

        return [
            'status' => 'success',
            'msg' => [],
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function specie(): BelongsTo
    {
        return $this->belongsTo(Specie::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function vaccines(): HasMany
    {
        return $this->hasMany(Vaccine::class);
    }

    public function dewormers(): HasMany
    {
        return $this->hasMany(Dewormer::class);
    }

    /*public function medicalRecords(): HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }*/

    public function daycareEnrollment(): HasOne
    {
        return $this->hasOne(DaycareEnrollment::class);
    }
}

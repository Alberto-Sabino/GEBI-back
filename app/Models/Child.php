<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'birthDate',
        'commonCongregation',
        'gender'
    ];

    public function getBirthDateAttribute($value): string
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->attributes['birthDate'])->age;
    }

    public function getGenderLabelAttribute(): string
    {
        return match ($this->attributes['gender']) {
            'M' => 'Masculino',
            'F' => 'Feminino',
            default => 'Não informado',
        };
    }
}

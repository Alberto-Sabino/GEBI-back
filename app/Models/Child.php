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

    public function getBirthDateAttribute(): Carbon
    {
        return Carbon::parse($this->birthDate);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'document',
        'password',
        'birthDate',
        'baptismYear',
        'phone',
        'email',
        'city',
        'commonCongregation'
    ];

    protected $hidden = [
        'password',
        'document'
    ];

    protected $casts = [
        'baptismYear' => 'integer'
    ];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getBirthDateAttribute(): Carbon
    {
        return Carbon::parse($this->birthDate);
    }
}

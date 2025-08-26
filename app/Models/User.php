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

    public function setDocumentAttribute($value): void
    {
        $this->attributes['document'] = preg_replace('/\D/', '', $value);
    }

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = md5($value);
    }

    public function getBirthDateAttribute(): Carbon
    {
        return Carbon::parse($this->birthDate);
    }
}

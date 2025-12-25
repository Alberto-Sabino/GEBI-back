<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $fullName
 * @property string $document
 * @property string $password
 * @property Carbon $birthDate
 * @property int $baptismYear
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property bool $commonCongregation
 */
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

    public function getBirthDateAttribute($value): string
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}

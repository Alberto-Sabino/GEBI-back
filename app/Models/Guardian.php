<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $fullName
 * @property string $phone
 * @property string $city
 * @property bool $commonCongregation
 */
class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'phone',
        'city',
        'commonCongregation'
    ];
}

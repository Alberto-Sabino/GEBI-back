<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $theme
 * @property Carbon $date
 * @property string $date_formatted
 * @property string $city
 * @property int $creator_id
 */
class ClassRoom extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'theme',
        'date',
        'city',
        'creator_id'
    ];

    public function getDateAttribute($value): Carbon
    {
        return Carbon::parse($value);
    }

    public function getDateFormattedAttribute($value): string
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}

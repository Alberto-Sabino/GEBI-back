<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int|null $child_id
 * @property int|null $guardian_id
 * @property string $action
 * @property string $date
 * @property string $time
 */
class Audit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'child_id',
        'guardian_id',
        'action',
        'date',
        'time',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'child_id' => 'integer',
        'guardian_id' => 'integer',
    ];

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s');
    }
}

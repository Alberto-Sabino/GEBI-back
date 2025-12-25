<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $class_room_id
 * @property int $child_id
 * @property int $guardian_id
 * @property string $entry_at
 * @property string $exit_at
 */
class ClassRoomChild extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'class_room_id',
        'child_id',
        'guardian_id',
        'user_id',
        'entry_at',
        'exit_at'
    ];

    protected $casts = [
        'class_room_id' => 'integer',
        'child_id' => 'integer',
        'guardian_id' => 'integer',
        'user_id' => 'integer'
    ];

    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id');
    }
}

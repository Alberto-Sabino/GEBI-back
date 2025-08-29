<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $class_room_id
 * @property int $user_id
 * @property string $entry_at
 * @property string $exit_at
 */
class ClassRoomUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'class_room_id',
        'user_id',
        'entry_at',
        'exit_at'
    ];

    protected $casts = [
        'class_room_id' => 'integer',
        'user_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

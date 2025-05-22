<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'date' => 'date'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianChildLink extends Model
{
    protected $fillable = [
        'guardian_id',
        'child_id',
        'relationship_code'
    ];
}

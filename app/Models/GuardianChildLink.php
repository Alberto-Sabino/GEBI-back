<?php

namespace App\Models;

use App\Enum\RelationshipEnum;
use App\Traits\RelationshipTrait;
use Illuminate\Database\Eloquent\Model;

class GuardianChildLink extends Model
{
    use RelationshipTrait;

    protected $fillable = [
        'guardian_id',
        'child_id',
        'relationship_code'
    ];

    protected $casts = [
        'guardian_id' => 'integer',
        'child_id' => 'integer',
        'id' => 'integer',
        'link_id' => 'integer',
    ];

    public function getRelationshipAttribute(string $value): ?string
    {
        return $this->getRelationshipLabel($value);
    }
}

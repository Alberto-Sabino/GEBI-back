<?php

namespace App\Repositories\Eloquent;

use App\Models\GuardianChildLink;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;
use Illuminate\Support\Collection;

class GuardianChildLinkRepository extends BaseRepository implements GuardianChildLinkRepositoryInterface
{
    public function __construct(
        GuardianChildLink $model
    ) {
        parent::__construct($model);
    }

    public function listByChildId(int $childId): Collection
    {
        return $this->model
            ->where('child_id', $childId)
            ->join('guardians', 'guardian_child_links.guardian_id', '=', 'guardians.id')
            ->get([
                'guardian_child_links.id as link_id',
                'guardian_child_links.relationship_code as relationship',
                'guardian_child_links.relationship_code as relationship_code',
                'guardian_child_links.guardian_id as guardian_id',
                'guardians.fullName as guardian_name',
                'guardians.phone as guardian_phone',
            ]);
    }

    public function listByGuardianId(int $guardianId): Collection
    {
        return $this->model
            ->where('guardian_id', $guardianId)
            ->join('children', 'guardian_child_links.child_id', '=', 'children.id')
            ->get([
                'guardian_child_links.id as link_id',
                'guardian_child_links.relationship_code as relationship',
                'guardian_child_links.relationship_code as relationship_code',
                'guardian_child_links.child_id as child_id',
                'children.fullName as child_name',
                'children.birthDate as child_birth_date',
            ]);
    }
}

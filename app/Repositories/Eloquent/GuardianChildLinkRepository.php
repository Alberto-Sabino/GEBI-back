<?php

namespace App\Repositories\Eloquent;

use App\Models\GuardianChildLink;
use App\Repositories\Contracts\BaseRepository;
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
                'guardian_child_links.*',
                'guardians.name as guardian_name',
                'guardians.email as guardian_email',
                'guardians.phone as guardian_phone',
            ]);
    }
}

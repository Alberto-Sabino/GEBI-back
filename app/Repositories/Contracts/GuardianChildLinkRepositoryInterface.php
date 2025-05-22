<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface GuardianChildLinkRepositoryInterface extends BaseRepositoryInterface
{
    public function listByChildId(int $childId): Collection;
}

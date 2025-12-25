<?php

namespace App\Services\GuardianChildLinkServices;

use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;

class ListGuardianChildLinkByChildIdService
{
    public function __construct(
        protected GuardianChildLinkRepositoryInterface $repository,
    ) {}

    public function list (int $childId): array
    {
        return $this->repository
            ->listByChildId($childId)
            ->toArray();
    }
}
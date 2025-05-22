<?php

namespace App\Services\GuardianChildLinkServices;

use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;

class ListGuardianChildLinksService
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
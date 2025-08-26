<?php

namespace App\Services\GuardianChildLinkServices;

use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;

class ListGuardianChildLinkByGuardianIdService
{
    public function __construct(
        protected GuardianChildLinkRepositoryInterface $repository,
    ) {}

    public function list(int $guardianId): array
    {
        return $this->repository
            ->listByGuardianId($guardianId)
            ->toArray();
    }
}

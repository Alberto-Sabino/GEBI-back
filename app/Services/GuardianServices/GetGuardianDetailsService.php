<?php

namespace App\Services\GuardianServices;

use App\Services\GuardianChildLinkServices\ListGuardianChildLinkByGuardianIdService;

class GetGuardianDetailsService
{
    public function __construct(
        protected GetGuardianByIdService $getGuardianByIdService,
        protected ListGuardianChildLinkByGuardianIdService $listGuardianChildLinkByGuardianIdService,
    ) {}

    public function get(int $id): array
    {
        $guardian = $this->getGuardianByIdService
            ->getById($id);

        $guardian['children'] = $this->listGuardianChildLinkByGuardianIdService
            ->list($id);

        return $guardian->toArray();
    }
}

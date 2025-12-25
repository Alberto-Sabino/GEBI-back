<?php

namespace App\Services\ChildServices;

use App\Services\BaseServices\GetByIdBaseService;
use App\Services\GuardianChildLinkServices\ListGuardianChildLinkByChildIdService;

class GetChildDetailsService extends GetByIdBaseService
{
    public function __construct(
        protected ListGuardianChildLinkByChildIdService $linksService,
        protected GetChildByIdService $getChildByIdService,
    ) {}

    public function get(int $id): array
    {
        $child = $this->getChildByIdService
            ->getById($id);

        $child['guardians'] = $this->linksService
            ->list($id);

        return $child->toArray();
    }
}

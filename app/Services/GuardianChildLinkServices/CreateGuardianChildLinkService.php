<?php

namespace App\Services\GuardianChildLinkServices;

use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;
use App\Services\BaseServices\CreateBaseService;

class CreateGuardianChildLinkService extends CreateBaseService
{
    public function __construct(GuardianChildLinkRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

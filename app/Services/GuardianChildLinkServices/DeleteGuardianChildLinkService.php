<?php

namespace App\Services\GuardianChildLinkServices;

use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;
use App\Services\BaseServices\DeleteBaseService;

class DeleteGuardianChildLinkService extends DeleteBaseService
{
    public function __construct(GuardianChildLinkRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

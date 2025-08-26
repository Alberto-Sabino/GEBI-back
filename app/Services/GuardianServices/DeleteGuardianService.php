<?php

namespace App\Services\GuardianServices;

use App\Repositories\Contracts\GuardianRepositoryInterface;
use App\Services\BaseServices\DeleteBaseService;

class DeleteGuardianService extends DeleteBaseService
{
    public function __construct(
        GuardianRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

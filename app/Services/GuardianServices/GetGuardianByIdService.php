<?php

namespace App\Services\GuardianServices;

use App\Repositories\Contracts\GuardianRepositoryInterface;
use App\Services\BaseServices\GetByIdBaseService;

class GetGuardianByIdService extends GetByIdBaseService
{
    public function __construct(
        GuardianRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

<?php

namespace App\Services\UserServices;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;
use App\Services\BaseServices\DeleteBaseService;

class DeleteUserService extends DeleteBaseService
{
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

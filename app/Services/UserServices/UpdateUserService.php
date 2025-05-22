<?php

namespace App\Services\UserServices;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\BaseServices\UpdateBaseService;

class UpdateUserService extends UpdateBaseService
{
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

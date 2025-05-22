<?php

namespace App\Services\UserServices;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\BaseServices\CreateBaseService;

class CreateUserService extends CreateBaseService
{
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

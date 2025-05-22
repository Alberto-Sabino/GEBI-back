<?php

namespace App\Services\UserServices;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\BaseServices\GetByIdBaseService;

class GetUserByIdService extends GetByIdBaseService
{
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

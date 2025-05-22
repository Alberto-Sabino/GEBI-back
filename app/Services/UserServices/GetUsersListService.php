<?php

namespace App\Services\UserServices;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\BaseServices\ListBaseService;

class GetUsersListService extends ListBaseService
{
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

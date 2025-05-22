<?php

namespace App\Services\ChildServices;

use App\Repositories\Contracts\ChildRepositoryInterface;
use App\Services\BaseServices\DeleteBaseService;

class DeleteChildService extends DeleteBaseService
{
    public function __construct(ChildRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

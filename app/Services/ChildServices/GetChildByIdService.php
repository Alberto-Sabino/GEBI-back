<?php

namespace App\Services\ChildServices;

use App\Repositories\Contracts\ChildRepositoryInterface;
use App\Services\BaseServices\GetByIdBaseService;

class GetChildByIdService extends GetByIdBaseService
{
    public function __construct(
        ChildRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

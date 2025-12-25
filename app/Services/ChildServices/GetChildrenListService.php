<?php

namespace App\Services\ChildServices;

use App\Repositories\Contracts\ChildRepositoryInterface;
use App\Services\BaseServices\ListBaseService;

class GetChildrenListService extends ListBaseService
{
    public function __construct(
        ChildRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

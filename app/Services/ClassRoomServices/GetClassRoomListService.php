<?php

namespace App\Services\ClassRoomServices;

use App\Repositories\Contracts\ClassRoomRepositoryInterface;
use App\Services\BaseServices\ListBaseService;

class GetClassRoomListService extends ListBaseService
{
    public function __construct(
        ClassRoomRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

<?php

namespace App\Services\ClassRoomServices;

use App\Repositories\Contracts\ClassRoomRepositoryInterface;
use App\Services\BaseServices\DeleteBaseService;

class DeleteClassRoomService extends DeleteBaseService
{
    public function __construct(ClassRoomRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

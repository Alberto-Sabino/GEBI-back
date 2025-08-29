<?php

namespace App\Services\ClassRoomUserServices;

use App\Repositories\Contracts\ClassRoomUserRepositoryInterface;
use App\Services\BaseServices\CreateBaseService;

class CreateClassRoomUserService extends CreateBaseService
{
    public function __construct(ClassRoomUserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

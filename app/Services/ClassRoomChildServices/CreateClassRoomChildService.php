<?php

namespace App\Services\ClassRoomChildServices;

use App\Models\ClassRoomChild;
use App\Repositories\Contracts\ClassRoomChildRepositoryInterface;
use App\Services\BaseServices\CreateBaseService;
use App\Traits\LoggedUserTrait;

class CreateClassRoomChildService extends CreateBaseService
{
    public function __construct(ClassRoomChildRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}

<?php

namespace App\Services\ClassRoomServices;

use App\Models\ClassRoom;
use App\Repositories\Contracts\ClassRoomRepositoryInterface;
use App\Services\BaseServices\CreateBaseService;
use App\Traits\LoggedUserTrait;
use Illuminate\Database\Eloquent\Model;

class CreateClassRoomService extends CreateBaseService
{
    use LoggedUserTrait;

    public function __construct(ClassRoomRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function create(array $data): ClassRoom
    {
        $data['creator_id'] = $this->getLoggedUserId();
        return parent::create($data);
    }
}

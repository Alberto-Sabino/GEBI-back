<?php

namespace App\Services\UserServices;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\BaseServices\DeleteBaseService;

class DeleteUserService
{
    public function __construct(
        protected UpdateUserService $updateUserService
    ) {}

    public function delete(int $id): bool
    {
        return $this->updateUserService
            ->update($id, ['active' => false]);
    }
}

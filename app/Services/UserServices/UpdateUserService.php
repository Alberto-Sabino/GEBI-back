<?php

namespace App\Services\UserServices;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\BaseServices\UpdateBaseService;

class UpdateUserService extends UpdateBaseService
{
    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }

    public function update(int $id, array $data): bool
    {
        // Removing password from data if it's empty...
        // (pass can only be updated on the forgot password flow)
        if (isset($data['password']) && empty($data['password'])) {
            unset($data['password']);
        }

        return parent::update($id, $data);
    }
}

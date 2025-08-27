<?php

namespace App\Services\UserServices;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\BaseServices\CreateBaseService;
use App\Traits\PasswordTrait;

class CreateUserService extends CreateBaseService
{
    use PasswordTrait;

    public function __construct(
        UserRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }

    public function create(array $data): User
    {
        $data['password'] = $this->generateRandomPassword();
        return parent::create($data);
    }
}

<?php

namespace App\Services\UserServices;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class AuthUserService
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ) {}

    public function auth(string $document, string $password): ?User
    {
        return $this->repository
            ->auth($document, bcrypt($password));
    }
}

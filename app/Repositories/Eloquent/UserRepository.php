<?php

namespace App\Repositories\Contracts;

use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(protected User $model)
    {
        parent::__construct($model);
    }

    public function auth(string $document, string $password): ?User
    {
        return $this->model
            ->where('document', $document)
            ->where('password', $password)
            ->first();
    }
}

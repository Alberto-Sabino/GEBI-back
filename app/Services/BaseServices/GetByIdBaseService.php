<?php

namespace App\Services\BaseServices;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class GetByIdBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    public function getById(int $id): ?Model
    {
        return $this->repository
            ->getById($id);
    }
}

<?php

namespace App\Services\BaseServices;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Support\Collection;

class GetAllBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    public function getAll(): Collection
    {
        return $this->repository
            ->all();
    }
}
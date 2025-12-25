<?php

namespace App\Services\BaseServices;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateBaseService
{
    protected const AUDIT_ACTION = 'CREATED';

    public function __construct(
        protected BaseRepositoryInterface $repository,
    ) {}

    public function create(array $data): Model
    {
        return $this->repository
            ->create($data);
    }
}

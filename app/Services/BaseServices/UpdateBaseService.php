<?php

namespace App\Services\BaseServices;

use App\Repositories\Contracts\BaseRepositoryInterface;

class UpdateBaseService
{
    protected const AUDIT_ACTION = 'UPDATED';

    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    public function update(int $id, array $data): bool
    {
        return $this->repository
            ->update($id, $data);
    }
}

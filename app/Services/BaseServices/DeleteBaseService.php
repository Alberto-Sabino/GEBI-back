<?php

namespace App\Services\BaseServices;

use App\Repositories\Contracts\BaseRepositoryInterface;

class DeleteBaseService
{
    protected const AUDIT_ACTION = 'DELETED';

    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    public function delete(int $id): bool
    {
        return $this->repository
            ->delete($id);
    }
}

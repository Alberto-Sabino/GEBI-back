<?php

namespace App\Services\ChildServices;

use App\Repositories\Contracts\ChildRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;
use App\Services\BaseServices\UpdateBaseService;

class UpdateChildService extends UpdateBaseService
{
    public function __construct(
        ChildRepositoryInterface $repository,
        protected CreateAuditService $createAuditService
    ) {
        parent::__construct($repository);
    }

    public function update(int $id, array $data): bool
    {
        $updated = parent::update($id, $data);

        if ($updated) {
            $this->audit($id);
        }

        return $updated;
    }

    private function audit(int $id): void
    {
        $this->createAuditService->create([
            'action' => self::AUDIT_ACTION,
            'child_id' => $id
        ]);
    }
}

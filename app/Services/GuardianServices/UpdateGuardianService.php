<?php

namespace App\Services\GuardianServices;

use App\Services\BaseServices\UpdateBaseService;
use App\Repositories\Contracts\GuardianRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;

class UpdateGuardianService extends UpdateBaseService
{
    public function __construct(
        GuardianRepositoryInterface $repository,
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
            'action' => parent::AUDIT_ACTION,
            'guardian_id' => $id
        ]);
    }
}

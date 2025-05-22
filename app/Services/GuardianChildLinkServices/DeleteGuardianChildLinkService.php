<?php

namespace App\Services\GuardianChildLinkServices;

use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;
use App\Services\BaseServices\DeleteBaseService;

class DeleteGuardianChildLinkService extends DeleteBaseService
{
    public function __construct(
        GuardianChildLinkRepositoryInterface $repository,
        protected CreateAuditService $createAuditService
    ) {
        parent::__construct($repository);
    }

    public function delete(int $id): bool
    {
        $deleted = parent::delete($id);

        if ($deleted) {
            $this->audit($id);
        }

        return $deleted;
    }

    private function audit(int $id): void
    {
        $this->createAuditService->create([
            'action' => parent::AUDIT_ACTION,
            'guardian_child_link_id' => $id
        ]);
    }
}

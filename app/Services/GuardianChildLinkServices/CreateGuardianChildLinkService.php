<?php

namespace App\Services\GuardianChildLinkServices;

use App\Models\GuardianChildLink;
use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;
use App\Services\BaseServices\CreateBaseService;

class CreateGuardianChildLinkService extends CreateBaseService
{
    public function __construct(
        GuardianChildLinkRepositoryInterface $repository,
        protected CreateAuditService $createAuditService
    ) {
        parent::__construct($repository);
    }

    public function create(array $data): GuardianChildLink
    {
        $guardianChildLink = parent::create($data);

        if ($guardianChildLink) {
            $this->audit($guardianChildLink->child_id, $guardianChildLink->guardian_id);
        }

        return $guardianChildLink;
    }

    private function audit(int $childId, int $guardianId): void
    {
        $this->createAuditService->create([
            'action' => parent::AUDIT_ACTION . '_LINK',
            'guardian_id' => $guardianId,
            'child_id' => $childId
        ]);
    }
}

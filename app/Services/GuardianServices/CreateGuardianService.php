<?php

namespace App\Services\GuardianServices;

use App\Models\Guardian;
use App\Services\BaseServices\CreateBaseService;
use App\Repositories\Contracts\GuardianRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;

class CreateGuardianService extends CreateBaseService
{
    public function __construct(
        GuardianRepositoryInterface $repository,
        protected CreateAuditService $createAuditService
    ) {
        parent::__construct($repository);
    }

    public function create(array $data): Guardian
    {
        $guardian = parent::create($data);

        if ($guardian) {
            $this->audit($guardian->id);
        }

        return $guardian;
    }

    private function audit(int $id): void
    {
        $this->createAuditService->create([
            'action' => parent::AUDIT_ACTION,
            'guardian_id' => $id
        ]);
    }
}

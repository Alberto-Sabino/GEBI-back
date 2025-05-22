<?php

namespace App\Services\ChildServices;

use App\Models\Child;
use App\Repositories\Contracts\ChildRepositoryInterface;
use App\Services\AuditServices\CreateAuditService;
use App\Services\BaseServices\CreateBaseService;

class CreateChildService extends CreateBaseService
{
    public function __construct(
        ChildRepositoryInterface $repository,
        protected CreateAuditService $createAuditService
    ) {
        parent::__construct($repository);
    }

    public function create(array $data): Child
    {
        $child = parent::create($data);

        if ($child) {
            $this->audit($child->id);
        }

        return $child;
    }

    private function audit(int $id): void
    {
        $this->createAuditService->create([
            'action' => parent::AUDIT_ACTION,
            'child_id' => $id
        ]);
    }
}

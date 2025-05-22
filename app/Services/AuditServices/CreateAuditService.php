<?php

namespace App\Services\AuditServices;

use App\Models\Audit;
use App\Repositories\Contracts\AuditRepositoryInterface;
use App\Services\BaseServices\CreateBaseService;
use App\Traits\LoggedUserTrait;
use Carbon\Carbon;

class CreateAuditService extends CreateBaseService
{
    use LoggedUserTrait;

    public function __construct(
        protected AuditRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }

    /**
     * Creates a new audit record with the provided data.
     *
     * Adds additional audit information such as user ID, date and time
     * to the data before creating the audit record.
     *
     * @param array $data The data for creating the audit record. ['action' => 'required', 'personal_token' => 'required', ...]
     * @return Audit The created audit instance.
     */

    public function create(array $data): Audit
    {
        $this->addAuditInfos($data);
        return parent::create($data);
    }

    private function addAuditInfos(array &$data): void
    {
        $data['user_id'] = $this->getLoggedUserId($data['personal_token']);
        $data['date'] = Carbon::now()->toDateString();
        $data['time'] = Carbon::now()->toTimeString();
    }
}

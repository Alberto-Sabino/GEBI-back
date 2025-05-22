<?php

namespace App\Services\AuditServices;

use App\Repositories\Contracts\AuditRepositoryInterface;
use App\Services\BaseServices\ListBaseService;

class GetAuditListService extends ListBaseService
{
    public function __construct(
        protected AuditRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

<?php

namespace App\Services\GuardianServices;

use App\Repositories\Contracts\GuardianRepositoryInterface;
use App\Services\BaseServices\ListBaseService;

class GetGuardiansListService extends ListBaseService
{
    public function __construct(
        GuardianRepositoryInterface $repository
    ) {
        parent::__construct($repository);
    }
}

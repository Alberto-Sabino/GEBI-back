<?php

namespace App\Repositories\Eloquent;

use App\Models\Audit;
use App\Repositories\Contracts\BaseRepository;
use App\Repositories\Contracts\AuditRepositoryInterface;

class AuditRepository extends BaseRepository implements AuditRepositoryInterface
{
    public function __construct(
        protected Audit $model
    ) {
        parent::__construct($model);
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Models\Audit;
use App\Repositories\Contracts\AuditRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class AuditRepository extends BaseRepository implements AuditRepositoryInterface
{
    public function __construct(
        Audit $model
    ) {
        parent::__construct($model);
    }
}

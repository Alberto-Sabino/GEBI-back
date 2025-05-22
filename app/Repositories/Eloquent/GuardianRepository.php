<?php

namespace App\Repositories\Eloquent;

use App\Models\Guardian;
use App\Repositories\Contracts\BaseRepository;
use App\Repositories\Contracts\GuardianRepositoryInterface;

class GuardianRepository extends BaseRepository implements GuardianRepositoryInterface
{
    public function __construct(
        protected Guardian $model
    ) {
        parent::__construct($model);
    }
}

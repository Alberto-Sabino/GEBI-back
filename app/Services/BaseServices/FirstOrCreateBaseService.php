<?php

namespace App\Services\BaseServices;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FirstOrCreateBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ){}

    public function firstOrCreate(array $match, array $data): Model
    {
        return $this->repository
            ->firstOrCreate($match, $data);
    }
}
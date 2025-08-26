<?php

namespace App\Services\BaseServices;

use App\Exceptions\TreatedException;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class GetByIdBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    public function getById(int $id): Model
    {
        $model = $this->repository
            ->getById($id);

        if (!$model) {
            throw new TreatedException('Registro não encontrado, verifique o identificador da solicitação.', 404);
        }

        return $model;
    }
}

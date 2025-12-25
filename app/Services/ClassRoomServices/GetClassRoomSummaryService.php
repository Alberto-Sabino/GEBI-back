<?php

namespace App\Services\ClassRoomServices;

use App\Exceptions\TreatedException;
use App\Models\ClassRoom;
use App\Repositories\Contracts\ClassRoomRepositoryInterface;
use stdClass;

class GetClassRoomSummaryService
{
    public function __construct(
        protected ClassRoomRepositoryInterface $repository
    ) {}

    public function getSummaryByClassRoomId(int $classRoomId): array
    {
        $summary = $this->repository
            ->getSummaryByClassRoomId($classRoomId);

        if (!$summary) {
            throw new TreatedException('Registro não encontrado, verifique o identificador da solicitação.', 400);
        }

        return (array) $summary;
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Models\Audit;
use App\Repositories\Contracts\AuditRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuditRepository extends BaseRepository implements AuditRepositoryInterface
{
    public function __construct(
        Audit $model
    ) {
        parent::__construct($model);
    }

    public function listAudits(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        $query = $this->model->query();

        $query->join('users', 'audits.user_id', '=', 'users.id')
            ->leftJoin('children', 'audits.child_id', '=', 'children.id')
            ->leftJoin('guardians', 'audits.guardian_id', '=', 'guardians.id')
            ->select(
                'audits.date',
                'audits.time',
                'audits.user_id',
                'users.fullName as user_name',
                'audits.action',
                'audits.child_id',
                'children.fullName as child_name',
                'audits.guardian_id',
                'guardians.fullName as guardian_name'
            );

        if ($request->hasFilters()) {
            $request->applyFilters($query);
        }

        return $query->paginate(...$request->getPagination());
    }
}

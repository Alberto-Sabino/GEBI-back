<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Models\Guardian;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\GuardianRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GuardianRepository extends BaseRepository implements GuardianRepositoryInterface
{
    public function __construct(
        Guardian $model
    ) {
        parent::__construct($model);
    }

    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        $query = $this->model->query();

        $query->leftJoin('guardian_child_links', 'guardians.id', '=', 'guardian_child_links.guardian_id')
            ->select(
                'guardians.id',
                'guardians.fullName',
                'guardians.phone',
                'guardians.city',
                'guardians.commonCongregation',
            )
            ->selectRaw('COUNT(guardian_child_links.id) as children_count')
            ->groupBy('guardians.id', 'guardians.fullName', 'guardians.phone', 'guardians.city', 'guardians.commonCongregation');

        if ($request->hasFilters()) {
            $request->applyFilters($query);
        }

        return $query->paginate(...$request->getPagination());
    }
}

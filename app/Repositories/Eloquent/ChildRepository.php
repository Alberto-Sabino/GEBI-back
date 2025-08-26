<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Models\Child;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\ChildRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ChildRepository extends BaseRepository implements ChildRepositoryInterface
{
    public function __construct(
        Child $child
    ) {
        parent::__construct($child);
    }

    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        $query = $this->model->query();

        $query->leftJoin('guardian_child_links', 'children.id', '=', 'guardian_child_links.child_id')
            ->select(
                'children.id',
                'children.fullName',
                'children.birthDate',
                'children.commonCongregation',
                'children.gender',
                DB::raw('COUNT(guardian_child_links.id) as guardians_count')
            )->distinct()
            ->groupBy('children.id', 'children.fullName', 'children.birthDate', 'children.commonCongregation', 'children.gender');

        if ($request->hasFilters()) {
            $request->applyFilters($query);
        }

        return $query->paginate(...$request->getPagination());
    }
}

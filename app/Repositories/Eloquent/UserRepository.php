<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function auth(string $document, string $password): ?User
    {
        return $this->model
            ->where('document', $document)
            ->where('password', $password)
            ->first();
    }

    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        $query = $this->model->query();
        $query->select(
            'document',
            'users.*'
        );

        if ($request->hasFilters()) {
            $request->applyFilters($query);
        }

        return $query->paginate(...$request->getPagination());
    }
}

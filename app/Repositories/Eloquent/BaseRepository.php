<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function list(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        $query = $this->model->query();

        if ($request->hasFilters()) {
            $request->applyFilters($query);
        }

        return $query->paginate(...$request->getPagination());
    }

    public function getById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function firstOrCreate(array $match, array $data): Model
    {
        return $this->model->firstOrCreate($match, $data);
    }

    public function update(int $id, array $data): bool
    {
        $model = $this->getById($id);
        if (!$model) return false;

        return $model->update($data);
    }


    public function delete(int $id): bool
    {
        $model = $this->getById($id);
        if (!$model) return true;

        return $model->delete();
    }
}

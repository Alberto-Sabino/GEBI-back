<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\PaginationAndFiltersRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function all(): Collection;

    public function list(PaginationAndFiltersRequest $request): LengthAwarePaginator;

    public function getById(int $id): ?Model;

    public function create(array $data): Model;

    public function firstOrCreate(array $match, array $data): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}

<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Builder;

class PaginationAndFiltersRequest extends BaseRequest
{
    private array $filters;
    private int $page;
    private int $size;

    public function __construct()
    {
        $this->filters = $this->query('filter', []);
        $this->page = $this->query('page', 1);
        $this->size = $this->query('size', 25);
    }

    public function getPagination(): array
    {
        return [$this->size, ['*'], 'page', $this->page];
    }

    public function hasFilters(): bool
    {
        return count($this->filters) > 0;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function applyFilters(Builder &$queryBuilder)
    {
        foreach ($this->filters as $column => $value) {
            if (is_null($value)) {
                continue;
            }

            if (is_array($value)) {
                $queryBuilder->whereIn($column, $value);
                continue;
            }

            $queryBuilder->where($column, $value);
        }
    }
}

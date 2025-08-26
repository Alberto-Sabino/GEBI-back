<?php

namespace App\Repositories\Eloquent;

use App\Models\Child;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\ChildRepositoryInterface;

class ChildRepository extends BaseRepository implements ChildRepositoryInterface
{
    public function __construct(
        Child $child
    ) {
        parent::__construct($child);
    }
}

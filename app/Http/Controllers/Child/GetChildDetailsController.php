<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Services\ChildServices\GetChildDetailsService;
use Illuminate\Http\Request;

class GetChildDetailsController extends Controller
{
    public function __construct(
        protected GetChildDetailsService $getChildDetailsService
    ) {}

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(
                $this->getChildDetailsService
                    ->get($id)
            );
    }
}

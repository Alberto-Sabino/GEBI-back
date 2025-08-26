<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\UserServices\CreateUserService;
use Illuminate\Support\Facades\DB;

class CreateUserController extends Controller
{
    public function __construct(
        protected CreateUserService $createUserService
    ) {}

    public function create(CreateUserRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $user = $this->createUserService
                ->create($request->all());
            DB::commit();

            return response()->json([], $user->exists ? 201 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

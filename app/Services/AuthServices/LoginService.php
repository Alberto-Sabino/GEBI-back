<?php

namespace App\Services\AuthServices;

use App\Exceptions\TreatedException;
use App\Models\User;
use App\Services\UserServices\AuthUserService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class LoginService
{
    public function __construct(
        protected AuthUserService $authUserService
    ) {}

    public function login(array $data): User
    {
        $user = $this->authUserService
            ->auth($data['document'], $data['password']);

        if (!$user) {
            throw new TreatedException('Credenciais inválidas!', 401);
        }

        $personal_token = Str::random(32);
        Cache::put($personal_token, $user, now()->addHours(6));

        $user->personal_token = $personal_token;
        return $user;
    }
}

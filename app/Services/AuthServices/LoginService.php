<?php

namespace App\Services\AuthServices;

use App\Exceptions\TreatedException;
use App\Models\User;
use App\Services\UserServices\AuthUserService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
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

        $personalToken = Str::random(32);
        Cache::put($personalToken, $user, now()->addHours(3));

        $user->personalToken = $personalToken;
        return $user;
    }
}

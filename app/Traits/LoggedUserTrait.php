<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

trait LoggedUserTrait
{
    public function getLoggedUser(): ?User
    {
        $personalToken = session('personal-token');
        return Cache::get($personalToken);
    }

    public function getLoggedUserId(): ?int
    {
        $personalToken = session('personal-token');
        $user = $this->getLoggedUser($personalToken);
        return $user ? $user->id : null;
    }
}

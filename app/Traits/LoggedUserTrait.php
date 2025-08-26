<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

trait LoggedUserTrait
{
    public function getLoggedUser(): ?User
    {
        $personalToken = session('personal-token');
        return Cache::get($personalToken);
    }

    public function getLoggedUserId(): ?int
    {
        $user = $this->getLoggedUser();
        return $user ? $user->id : null;
    }
}

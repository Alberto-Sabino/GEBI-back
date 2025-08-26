<?php

namespace App\Providers;

use App\Repositories\Contracts\AuditRepositoryInterface;
use App\Repositories\Contracts\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Contracts\ChildRepositoryInterface;
use App\Repositories\Contracts\GuardianChildLinkRepositoryInterface;
use App\Repositories\Contracts\GuardianRepositoryInterface;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\AuditRepository;
use App\Repositories\Eloquent\ChildRepository;
use App\Repositories\Eloquent\GuardianChildLinkRepository;
use App\Repositories\Eloquent\GuardianRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind(
            BaseRepositoryInterface::class,
            BaseRepository::class
        );

        app()->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        app()->bind(
            ChildRepositoryInterface::class,
            ChildRepository::class
        );

        app()->bind(
            AuditRepositoryInterface::class,
            AuditRepository::class
        );

        app()->bind(
            GuardianRepositoryInterface::class,
            GuardianRepository::class
        );

        app()->bind(
            GuardianChildLinkRepositoryInterface::class,
            GuardianChildLinkRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

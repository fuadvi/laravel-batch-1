<?php

namespace App\Providers;

use App\Repository\Cinemas\CinemasRepository;
use App\Repository\Cinemas\ICinemasRepository;
use App\Repository\User\IUserRepository;
use App\Repository\User\UserRepository;
use App\Service\Auth\AuthService;
use App\Service\Auth\IAuthService;
use App\Service\Cinemas\CinemasService;
use App\Service\Cinemas\ICinemasService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);

        $this->app->bind(ICinemasService::class, CinemasService::class);
        $this->app->bind(ICinemasRepository::class, CinemasRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

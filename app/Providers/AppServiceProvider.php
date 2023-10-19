<?php

namespace App\Providers;

use App\Repository\Cinemas\CinemasRepository;
use App\Repository\Cinemas\ICinemasRepository;
use App\Repository\film\FilmRepository;
use App\Repository\film\IFilmRepository;
use App\Repository\User\IUserRepository;
use App\Repository\User\UserRepository;
use App\Service\Auth\AuthService;
use App\Service\Auth\IAuthService;
use App\Service\Cinemas\CinemasService;
use App\Service\Cinemas\ICinemasService;
use App\Service\film\FIlmService;
use App\Service\film\IFilmService;
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

        $this->app->bind(IFilmService::class, FIlmService::class);
        $this->app->bind(IFilmRepository::class, FilmRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

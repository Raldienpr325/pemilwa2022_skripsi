<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            App\Repositories\Testing\TestingRepository::class,
            App\Repositories\Testing\TestingRepositoryInterface::class
        );
        $this->app->bind(
            App\Repositories\DpmFikes\DpmFikesRepository::class,
            App\Repositories\DpmFikes\DpmFikesRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\DpmFK\DpmfkRepository::class,
            App\Repositories\DpmFK\DpmfkRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\PresmaFikes\PresmaFikesRepository::class,
            App\Repositories\PresmaFikes\PresmaFikesRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\PresmaFK\PresmaFKRepository::class,
            App\Repositories\PresmaFikes\PresmaFkRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\Psigb\PsigbRepository::class,
            App\Repositories\Psigb\PsigbRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\Psigl\PsiglRepository::class,
            App\Repositories\Psigl\PsiglRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\Psikb\PsikbRepository::class,
            App\Repositories\Psikb\PsikbRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\Psikls\PsiklsRepository::class,
            App\Repositories\Psikls\PsiklsRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\Pskb\PskbRepository::class,
            App\Repositories\Pskb\PskbRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\Psked\PskedRepository::class,
            App\Repositories\Psked\PskedRepositoryEloquent::class
        );
        $this->app->bind(
            App\Repositories\Pssf\PssfRepository::class,
            App\Repositories\Pssf\PssfRepositoryEloquent::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}

<?php

namespace App\Providers;

use App\Modules\Client\Infra\Contracts\ClientRepositoryInterface;
use App\Modules\Client\Infra\Repositories\ClientRepository;
use App\Modules\User\Infra\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\User\Infra\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

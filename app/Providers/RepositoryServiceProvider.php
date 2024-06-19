<?php

namespace App\Providers;

use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\LogRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LogRepositoryInterface::class,
            LogRepository::class
        );
    }
}

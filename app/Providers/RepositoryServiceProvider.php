<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DeviceRepository;
use App\Repositories\LocationRepository;
use App\Repositories\OrganizationRepository;
use App\Interfaces\DeviceRepositoryInterface;
use App\Interfaces\LocationRepositoryInterface;
use App\Interfaces\OrganizationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(DeviceRepositoryInterface::class, DeviceRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

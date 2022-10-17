<?php

namespace App\Providers;

use App\Services\LinkService;
use App\Services\LinkServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        LinkServiceInterface::class => LinkService::class
    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

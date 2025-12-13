<?php

namespace Laravel;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Laravel\Middleware\JwtMiddleware;
use Laravel\Providers\RouteServiceProvider;

/**
 * LaravelServicesProvider registers package services and middleware.
 * Main service provider for the Laravel package initialization.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class LaravelServicesProvider extends ServiceProvider{
    /**
     * Register any application services.
     *
     * @return void
     */
    function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @param Kernel $kernel
     * @param Router $router
     * @return void
     */
    function boot ( Kernel $kernel , Router $router ): void {
        App ::register ( RouteServiceProvider::class );
        $this -> _registerMiddleware ( $router );
    }

    /**
     * Register middleware aliases.
     *
     * @param Router $router
     * @return void
     */
    protected function _registerMiddleware ( Router $router ): void {
        $router -> aliasMiddleware ( 'jwt.verify' , JwtMiddleware::class );
    }
}

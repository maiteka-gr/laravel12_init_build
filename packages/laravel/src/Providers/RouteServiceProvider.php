<?php

namespace Laravel\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * RouteServiceProvider handles API route registration and configuration.
 * Manages route mapping and middleware assignment for the package.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class RouteServiceProvider extends ServiceProvider{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
	public function boot() {
		parent::boot();
	}

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map() {
        $this->_mapRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function _mapRoutes() {
        Route::middleware( 'api' )->group( function () {
            Route::prefix( 'api' )->group( __DIR__ . '/../Routers/api.php' );
        } );
    }
}

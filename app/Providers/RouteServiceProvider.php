<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
<<<<<<< HEAD
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
=======
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
<<<<<<< HEAD
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
=======
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    }
}

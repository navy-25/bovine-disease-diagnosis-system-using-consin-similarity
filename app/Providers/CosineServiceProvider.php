<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CosineServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path().'/Libraries/Cosinesimilarity.php';
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

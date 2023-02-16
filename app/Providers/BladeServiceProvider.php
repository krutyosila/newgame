<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('hasRole', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->role == '".$role."') : ?>";
        });
        Blade::directive('endRole', function () {
            return "<?php endif; ?>";
        });
    }
}

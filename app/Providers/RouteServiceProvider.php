<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        foreach (glob(base_path('routes/api/v*/*')) as $file) {
            $version = basename(dirname($file));

            Route::middleware('api')
                ->prefix("api/{$version}")
                ->group($file);
        }

        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\Hometask\Smartphone;
use App\Lib\Hometask\Cpu;
use App\Lib\Hometask\Display;
use App\Lib\Hometask\Camera;
use App\Lib\Hometask\Battery;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind("Smartphone", function ($app) {
            return new Smartphone(
                    "Apple iPhone",
                    new Cpu("Qualcomm 5555", 2),
                    new Display(480, 320),
                    new Camera(8),
                    new Battery(1234)
                );
        });
    }
}

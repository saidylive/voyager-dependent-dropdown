<?php

namespace Saidy\VoyagerDependentDropdown\Providers;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\ServiceProvider;
use Saidy\VoyagerDependentDropdown\FormFields\SelectDependentDropdown;


class VoyagerDependentServiceProvider extends ServiceProvider
{
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
        Voyager::addFormField(SelectDependentDropdown::class);
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/voyager'),
        ]);

        $this->publishes([
            __DIR__.'/../../public' => public_path('/'),
        ], 'public');
    }
}

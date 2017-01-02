<?php

namespace simuaagua\Services\Inspinia;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'inspinia');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/inspinia'),
        ],'public');

        $this->publishes([
            __DIR__.'/config.php' => config_path('inspinia.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__.'/config.php', 'inspinia');


        $this->app->bindShared('bootstrapForm', function($app) {
            return new BootstrapForm($app['html'], $app['form'], $app['config']);
        });

        $this->app->bindShared('inspiniaForm', function($app) {
            return new InspiniaForm($app['html'], $app['form'], $app['config']);
        });
    }

    public function provides(){
        return ['bootstrapForm','inspiniaForm'];
    }
}

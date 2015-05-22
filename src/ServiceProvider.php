<?php namespace Zwarthoorn\Admincore;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
        // $this->handleMigrations();
         $this->handleViews();
        // $this->handleTranslations();
         $this->handleRoutes();
         $this->publishes([
             __DIR__.'/../vendorupload' => public_path('Zwarthoorn/Assets'),
            ], 'public');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/admincore.php';

        $this->publishes([$configPath => config_path('admincore.php')]);

        $this->mergeConfigFrom($configPath, 'admincore');
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom('packagename', __DIR__.'/../lang');
    }

    private function handleViews() {

        $this->loadViewsFrom( __DIR__.'/../views','Admincore');

        //$this->publishes([__DIR__.'/../views' => base_path('resources/views/vendor/packagename')]);
    }

    private function handleMigrations() {

        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')]);
    }

    private function handleRoutes() {

        include __DIR__.'/../routes.php';
    }
}

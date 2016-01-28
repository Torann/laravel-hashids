<?php namespace Torann\Hashids;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class HashidsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->isLumen() === false) {
            $this->publishes([
                __DIR__ . '/../../config/hashids.php' => config_path('hashids.php'),
            ]);

            // Add 'Assets' facade alias
            AliasLoader::getInstance()->alias('Hashids', 'Torann\Hashids\Facade');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('hashids', function ($app) {
            $config = $app->config->get('hashids');

            return new Hashids(
                array_get($config, 'salt'),
                array_get($config, 'length', 0),
                array_get($config, 'alphabet')
            );
        });
    }

    /**
     * Check if package is running under Lumen app
     *
     * @return bool
     */
    protected function isLumen()
    {
        return str_contains($this->app->version(), 'Lumen') === true;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['hashids'];
    }
}

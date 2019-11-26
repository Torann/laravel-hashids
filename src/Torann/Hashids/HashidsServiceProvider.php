<?php namespace Torann\Hashids;

use Hashids\Hashids;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
                Arr::get($config, 'salt'),
                Arr::get($config, 'length', 0),
                Arr::get($config, 'alphabet')
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
        return Str::contains($this->app->version(), 'Lumen') === true;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'hashids',
        ];
    }
}

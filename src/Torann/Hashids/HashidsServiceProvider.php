<?php namespace Torann\Hashids;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class HashidsServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->publishes([
            __DIR__.'/../../config/hashids.php' => $this->getConfigPath(),
        ]);

        if (! $this->isLumen()) {
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
        if ($this->isLumen()) {
            $this->app->configure('hashids');
        }

        // Bind 'hashids' shared component to the IoC container
        $this->app->singleton('hashids', function($app)
        {
            $configPath = __DIR__ . '/../../config/hashids.php';
            $this->mergeConfigFrom($configPath, 'hashids');

            $config = $app->config->get('hashids', array());

            return new Hashids($config['salt'], $config['length'], $config['alphabet']);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

    private function isLumen()
    {
        return str_contains($this->app->version(), 'Lumen');
    }

    private function getConfigPath()
    {
        if ($this->isLumen()) {
            return base_path('config/hashids.php');
        } else {
            return config_path('hashids.php');
        }
    }
}

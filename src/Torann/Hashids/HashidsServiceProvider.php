<?php namespace Torann\Hashids;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class HashidsServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Register the package namespace
		$this->package('torann/hashids');

		// Add 'Assets' facade alias
		AliasLoader::getInstance()->alias('Hashids', 'Torann\Hashids\Facade');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Bind 'hashids' shared component to the IoC container
		$this->app->singleton('hashids', function($app)
		{
			// Read settings from config file
			$config = $app->config->get('hashids::config', array());

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

}

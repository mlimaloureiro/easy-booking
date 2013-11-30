<?php namespace Mlimaloureiro\EasyBooking;

use Illuminate\Support\ServiceProvider;

class EasyBookingServiceProvider extends ServiceProvider {

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
	public function boot()
	{
		$this->package('mlimaloureiro/easy-booking');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['easybooking'] = $this->app->share(function($app) {
			return new EasyBooking;
		});

		$this->app->booting(function()
		{
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		  $loader->alias('EasyBooking', 'Mlimaloureiro\EasyBooking\Facades\EasyBooking');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('easybooking');
	}

}
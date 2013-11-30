<?php namespace Mlimaloureiro\EasyBooking;

use Illuminate\Support\ServiceProvider;
use App;
use LMongo;

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

		require_once __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		App::register('LMongo\LMongoServiceProvider');
		App::register('ExpressiveDateServiceProvider');

		$this->app['easybooking'] = $this->app->share(function($app) {
			return new EasyBooking(new Reservation(), new Room());
		});

		$this->app->booting(function()
		{
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		  $loader->alias('EasyBooking', 'Mlimaloureiro\EasyBooking\Facades\EasyBooking');
		  $loader->alias('LMongo', 'LMongo\Facades\LMongo');
		  $loader->alias('EloquentMongo', 'LMongo\Eloquent\Model');
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
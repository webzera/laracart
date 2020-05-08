<?php

namespace Webzera\Laracart\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class LaracartServiceProvider extends ServiceProvider
{
	public function boot()
	{
		Schema::defaultStringLength(191);

		$this->loadRoutesFrom(__DIR__. '/./../routes/web.php');
		$this->loadViewsFrom(__DIR__. '/./../../resources/views', 'cart');
	}

	public function register()
	{
		$this->registerPublishables();
	}
	private function registerPublishables()
	{
		$bashPath = dirname(__DIR__,2);

		$arrPublishable = [
			'seeds' => [
				// "$bashPath/publishable/database/seeds" => database_path('seeds'),
			],
			'migrations' => [
				// "$bashPath/publishable/database/migrations" => database_path('migrations'),
			],
			'config' => [
				// "$bashPath/publishable/config/laracart.php" => config_path('laracart.php') 
			],
			'middleware' => [
			],
			'controller' => [
				//"$bashPath/publishable/controllers/CartController.php" => app_path('Http/controllers/CartController.php'),
			],
			'views' => [
				"$bashPath/publishable/views/cart/index.blade.php" => resource_path('views/cart/index.blade.php'),
				"$bashPath/publishable/views/layouts/cartlayout.blade.php" => resource_path('views/layouts/cartlayout.blade.php'),
			],
			'public' => [
				// "$bashPath/publishable/public/vendor/laracart" => public_path('vendor/laracart') 
			]
		];

		foreach ($arrPublishable as $group => $paths) {
			$this->publishes($paths, $group);
		}
	}
}
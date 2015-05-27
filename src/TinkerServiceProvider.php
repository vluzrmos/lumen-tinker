<?php

namespace Vluzrmos\Tinker;

use Illuminate\Support\ServiceProvider;

class TinkerServiceProvider extends ServiceProvider{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->commands([
			'Vluzrmos\Tinker\TinkerCommand'
		]);
	}
}

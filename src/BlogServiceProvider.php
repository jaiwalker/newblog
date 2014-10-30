<?php namespace Jai\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	public function boot()
	{
		 $this->package('jai/blog',null, __DIR__); //  this  has to be specified for psr-4  compatibility
		if (\Config::get('blog::routes.use_package_routes', true))
		{
			include __DIR__ . '/routes.php';
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->package('jai/blog','blog');
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
<?php namespace Jai\Blog;

use Cartalyst\Sentry\Facades\CI\Sentry;
use Illuminate\Support\ServiceProvider;
use Jai\Authentication\AuthenticationServiceProvider;
use Jai\Authentication\Controllers\AuthController;


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
	 
		  $this->app['blog'] = $this->app->share(function($app)
		  {
			 
			  return new Blog;
		  });
		
		$this->app->booting(function()
		{
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		  $loader->alias('Blog', 'Jai\Blog\Facades\Blog');
		});
		
		$this->app->register('Jai\Authentication\AuthenticationServiceProvider');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('blog');
	}

}

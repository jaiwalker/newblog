<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 5:01 PM
 * FileName : EmailNotifier.php
 */

namespace Jai\Blog\Acmew\Listeners;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laracasts\Commander\Events\EventListener;
use Laracasts\Flash\Flash;
use Jai\Blog\Models\Blog;
use Redirect;

class EmailNotifier extends EventListener
{
	
	/**
	 * @var \Jai\Blog\Models\Blog
	 */
	public $blog;
	
	function __construct(Blog $blog)
	{
		
		$this->blog = $blog;
	}
	
	public function whenBlogIsPublished()
	{
	    Mail::send('emails.welcome', array('key' => 'value'), function($message)
		{
    		$message->to('jaykay@iddigital.com.au', 'John Smith')->subject('blog has been created !');
		});
		Log::info(' when blog is published log  you can  do what wver you want ');
		//Flash::message('something something '); // success // error- red
		//return Redirect::home();

	}
} 
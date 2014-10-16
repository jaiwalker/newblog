<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 5:01 PM
 * FileName : EmailNotifier.php
 */

namespace Jai\Blog\Acmew\Listeners;


use Illuminate\Support\Facades\Mail;
use Laracasts\Commander\Events\EventListener;
use Laracasts\Flash\Flash;
use Redirect;

class EmailNotifier extends EventListener
{
	public function whenBlogPublished()
	{
		Flash::message('something something '); // success // error- red
		//return Redirect::home();

	}
} 
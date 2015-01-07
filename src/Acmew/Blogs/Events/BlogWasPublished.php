<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 3:59 PM
 * FileName : BlogPublished.php
 */

namespace Jai\Blog\Acmew\Blogs\Events;


use Jai\Blog\Models\Blog;

class BlogWasPublished{

	public $blog;

	function __construct(Blog $blog)
	{
		$this->blog = $blog;
	}


} 
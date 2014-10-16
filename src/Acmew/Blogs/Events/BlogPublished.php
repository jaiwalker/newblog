<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 3:59 PM
 * FileName : BlogPublished.php
 */

namespace Jai\Blog\Acmew\Blogs\Events;


use Blog;

class BlogPublished{

	public $blog;

	function __construct(Blog $blog)
	{
		$this->blog = $blog;
	}


} 
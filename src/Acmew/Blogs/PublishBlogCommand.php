<?php namespace Jai\Blog\Acmew\Blogs;
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 11:53 AM
 * FileName : PublishBlogCommand.php
 */

class PublishBlogCommand 
{

	public $description;
	public $name;
	public $author;

	public function __construct($name, $description,$author)
	{

		$this->description = $description;
		$this->name = $name;
		$this->author = $author;
	}
}
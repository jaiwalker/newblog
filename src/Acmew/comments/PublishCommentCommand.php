<?php namespace Jai\Blog\Acmew\Comments;
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 11:53 AM
 * FileName : PublishCommenCommand.php
 */

class PublishCommentCommand
{
	
	public $comment;
	public $blog_id;
	public $userId;
	
	public function __construct($comment,$blog_id,$userId)
	{
<<<<<<< HEAD
		 
=======
		
>>>>>>> 3a68662121ee91cc76cd93c4d3cc5efd530940b7
		$this->comment = $comment;
		$this->userId = $userId;
		$this->blog_id = $blog_id;
	}
}               
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
		
		$this->comment = $comment;
		$this->userId = $userId;
		$this->blog_id = $blog_id;
	}
}               
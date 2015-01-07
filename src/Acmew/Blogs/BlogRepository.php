<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 1:27 PM
 * FileName : BlogRepository.php
 */

namespace Jai\Blog\Acmew\Blogs;

use Jai\Blog\Models\Blog;
use Comment;
use User;


class BlogRepository{

	public function test(){
		return "blog repos";
	}
	
	public function save(Blog $blog)
	{
		return $blog->save();
	}
	
	public function leaveComment($comment,$blog_id,$user_id)
	{
		
		$com = Comment::publish($comment,$blog_id);
		
		$comment = User::findOrFail($user_id)->comment()->save($com);
		
		return $comment;
	}

} 
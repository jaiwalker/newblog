<?php
	use \Laracasts\Commander\Events\EventGenerator;
	use Jai\Blog\Acmew\Comments\Events\CommentWasPublished;
	
class Comment extends \Eloquent {
	
	use EventGenerator;
	
	protected $fillable = ['comment','user_id','blog_id'];
	protected $table ='comments';
	
	public function owner()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public static function publish($comment,$blog_id)
	{
		$comment = new static(compact('comment','blog_id'));
		//$comment->raise(new CommentWasPublished($comment));
		
		return $comment;
	}
}
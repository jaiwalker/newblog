<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 10/10/2014
 * Time: 10:47 AM
 * FileName : PublishCommnetCommandHandler.php
 */
namespace Jai\Blog\Acmew\comments;

use Acme\Blogs\BlogRepository;
use Laracasts\Commander\CommandHandler;
//use Acme\comments\CommentRepository;
use Laracasts\Commander\Events\DispatchableTrait;
use Comment;

class PublishCommentCommandHandler implements CommandHandler
{
   use DispatchableTrait;
   protected $blogRepository;
	
	/**
    * @param \Acme\comments\CommentRepository $repository
    */
   function __construct(BlogRepository $blogRepository)
   {
      $this->blogRepository = $blogRepository;
   }
   
   /**
    * Handle the command
    *
    * @param $command
    *
    * @return mixed
    */
   public function handle($command)
   {
      // This  one is fine 
      //$comment = Comment::publish($command->comment,$command->blog_id);
      //dd($comment);
//      $comment= $this->repository->save($comment,$command->userId,$command->blog_id);
//      $this->dispatchEventsFor($comment);
       
       //  try this new method
      $comment = $this->blogRepository->leaveComment($command->comment, $command->blog_id, $command->userId);
      
      return $comment;
      
   }
} 
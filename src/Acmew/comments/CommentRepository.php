<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 10/10/2014
 * Time: 11:00 AM
 * FileName : CommentRepository.php
 */

namespace Jai\Blog\Acmew\comments;

//use Comment;
use User;

class CommentRepository 
{
   public function save(Comment $comment,$userId,$blog_id)
   {
    
      return User::findOrFail($userId)->Comment()->save($comment);
      //return User::findOrFail($userid)->Statuses()->save($status);
      //return $comment->save();      
   }
} 
<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 10/10/2014
 * Time: 12:06 PM
 * FileName : CommentWasPublished.php
 */

namespace Jai\Blog\Acmew\comments\Events;


class CommentWasPublished 
{
    public $comment;
   
   function __construct($comment)
   {
      $this->comment = $comment;
   }
} 
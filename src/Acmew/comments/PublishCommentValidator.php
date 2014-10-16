<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 10/10/2014
 * Time: 4:46 PM
 * FileName : PublishCommentValidator.php
 */

namespace Jai\Blog\Acmew\comments;


use Laracasts\Validation\FormValidator;

class PublishCommentValidator extends FormValidator 
{
       protected $rules =[
         'comment'=>'required' 
       ];
} 
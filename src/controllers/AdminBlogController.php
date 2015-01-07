<?php
use Jai\Blog\Models\Blog;

/**
 * Created by [id].
 * User: JayKay
 * Date: 22/12/2014
 * Time: 2:30 PM
 * FileName : AdminBlogController.php
 */

class AdminBlogController  extends \BaseController
{
    
    public function edit()
    {
        //try
        //{
        //    $user = $this->user_repository->find(Input::get('id'));
        //} catch(JaiExceptionsInterface $e)
        //{
        //    $user = new User;
        //}
        
        $blog = Blog::where(['id'=>Input::get('id')])->first();
                                                         
        return View::make('blog::blogs.admin.edit')->with(compact('blog'));
    }
    
    public function store()
    {
       //  this should follow a repo pattern - proper validation   and prob follow unit testing 
        extract(Input::only('name','description','author','status','id')); 
        
                                                                           
        $updated = Blog::where(array('id'=>$id))->update(compact('name','description','author','status','id'));
         $blog = Blog::where(['id'=>$id])->first();
           return Redirect::action('BlogsdashboardController@base')->withMessage("post has been updated");
        //if($updated) return View::make('blog::blogs.admin.list')->with(compact('blog'))->withMessage("User edited with success.");;
        //  you can  pass message and rediectr to respective postion 
        
    }
} 
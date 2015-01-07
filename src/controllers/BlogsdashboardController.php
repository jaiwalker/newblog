<?php 
	
//	use Jai\Blog\Acmew\Blogs\BlogsForm;
    use Laracasts\Commander\CommandBus;
	use Laracasts\Commander\CommanderTrait;
	use Jai\Blog\Acmew\Blogs\PublishBlogadminCommand;
	use Laracasts\Validation\FormValidationException;
    use Jai\Blog\Models\Blog;
    
   
//	

	class BlogsdashboardController extends \BaseController {
      
      use CommanderTrait;
      
      private $commandBus;
      
      function __construct(CommandBus $commandBus)
      {
         $this->commandBus = $commandBus;
      }
      
      public function base()
      {
         // var_dump( Blog::all() ); die();
          $blogs = Blog::all(); 
           $sidebar = array(
            "blogs list" => array('url' => URL::route('blogs.list'), 'icon' => '<i class="fa fa-users"></i>'),
            "Blog settings" => array('url' => URL::route('blog.settings'), 'icon' => '<i class="fa fa-plus-circle"></i>'),
        );
        return View::make('blog::blogs.admin.list')->with(["blogs" => $blogs,'sidebar_items'=> $sidebar]);
    
           //return View::make('laravel-authentication-acl::admin.dashboard.default');
      }
        
        public function edit($id = NULL)
        {
            return View::make('blog::blogs.admin.edit');
        }
      
      

}
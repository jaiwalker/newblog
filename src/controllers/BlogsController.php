<?php 
	
	use Jai\Blog\Acmew\Blogs\BlogsForm;
	use Laracasts\Commander\CommandBus;
	use Laracasts\Commander\CommanderTrait;
	use Jai\Blog\Acmew\Blogs\PublishBlogCommand;
	use Laracasts\Validation\FormValidationException;
	

	class BlogsController extends \BaseController {

	use CommanderTrait;
		
		/**
		 * @var \Laracasts\Commander\CommandBus              
		 */
		private $commandBus;
		/**
		 * @var \Acmew\Forms\BlogsForm
		 */
		private $blogsForm;
		
		/**
		 * @param \Laracasts\Commander\CommandBus $commandBus
		 * @param \Acmew\Forms\BlogsForm $blogsForm
		 *
		 * @internal param \Acme\Forms\BlogsForm $blogsForm
		 */
		function __construct(CommandBus $commandBus, BlogsForm $blogsForm )
		{
			$this->commandBus = $commandBus;
			$this->blogsForm = $blogsForm;
		}


	/**
	 * Display a listing of the resource.
	 * GET /blogs
	 *
	 * @return Response
	 */
	public function index()
	{
		$blogs = Blog::where('status',1)->get();
		 
		return View::make('blog::blogs/index',['blogs' => $blogs ] );
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /blogs/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /blogs
	 *
	 * @return Response
	 */
	public function store()
	{
		// making this more relavent 
		$input = Input::only('name','description','author');
		try
		{
			$this->blogsForm->validate($input);
			
				// Input that has  to be assigned to user
		// Using  command bus system
		extract(Input::only('name','description','author'));
		$command = new PublishBlogCommand($name,$description,$author);
		$r = $this->execute($command);

//		$input = Input::only('name', 'description', 'author');
//		$this->blogsForm->validate($input);
//	    $post = Blog::create($input);
		Laracasts\Flash\Flash::overlay('Glad that you have posted soemthing.. good '); // success // error- red
		return Redirect::back();
			
		} catch (FormValidationException $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		
		
//		// Input that has  to be assigned to user
//		// Using  command bus system
//		extract(Input::only('name','description','author'));
//		$command = new PublishBlogCommand($name,$description,$author);
//		$r = $this->execute($command);
//
////		$input = Input::only('name', 'description', 'author');
////		$this->blogsForm->validate($input);
////	    $post = Blog::create($input);
//		Flash::overlay('Glad that you have posted soemthing.. good '); // success // error- red
//		return Redirect::home();
	}

	/**
	 * Display the specified resource.
	 * GET /blogs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$setting = Blogsettings::where(['name'=>'comments'])->first();
	 
	    if($setting->status){
			$blog = Blog::with('comments')->findOrFail($id);
		}else{
			$blog = Blog::findOrFail($id);
		}
		
		
		return View::make ('blog::blogs/show', [ 'blog' => $blog,'comments_settings' =>$setting->status ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /blogs/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /blogs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /blogs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function notifyadmin()
	{
		Laracasts\Flash\Flash::message('Admin has been notified with your post  '); // success // error- red
		return Redirect::home();
	}

}
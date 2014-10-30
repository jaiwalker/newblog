<?php
	use Laracasts\Commander\CommanderTrait;
	use Jai\Blog\Acmew\Comments\PublishCommentCommand;

	use Laracasts\Validation\FormValidationException;
	use Jai\Blog\Acmew\Comments\PublishCommentsssValidator as commentForm;

	
	class CommentsController extends \BaseController {
	
	use CommanderTrait;
	
		protected $commentForm;
		
		function __construct(commentForm $commentForm )
		{
			$this->commentForm = $commentForm;

		}
		
		/**
	 * Display a listing of the resource.
	 * GET /comments
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /comments/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{

	   
		$authentication = \App::make('authenticator');
			// Getting the data from the form --  and adding the  curret user id to it 
		$input = array_add(Input::only('comment', 'blog_id'),'userId',$authentication->getLoggedUser()->id);
		

		try
		{
			$this->commentForm->validate($input);
			
			//	extract(Input::only('comment', 'blog_id'));
			// dd($input);
			$this->execute(PublishCommentCommand::class,$input);
			//		$r = $this->execute(new PublishCommentCommand(Input::get('comment'),Input::get('blog_id'), Auth::user()->id),
			//								  array('comment'   => Input::get('comment'),
			//										  'blog_id' => Input::get('blog_id'),
			//										  'userId' => Auth::user()->id));
			//		      dd($r);
			return Redirect::back();
			
		} catch (FormValidationException $e)
		{

			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		
		
		
	}

	/**
	 * Display the specified resource.
	 * GET /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /comments/{id}/edit
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
	 * PUT /comments/{id}
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
	 * DELETE /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
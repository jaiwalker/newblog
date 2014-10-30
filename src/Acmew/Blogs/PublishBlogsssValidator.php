<?php
	/**
	 * Created by [id].
	 * User: JayKay
	 * Date: 17/09/2014
	 * Time: 12:27 PM
	 * FileName : PublishBlogValidator.php
	 */
	
	namespace Jai\Blog\Acmew\Blogs;
	
	use Laracasts\Validation\FormValidator;
	
	class PublishBlogsssValidator extends FormValidator
	{
		protected $rules = [
	
			'name'        => 'required',
			'description' => 'required',
			'author'      => 'required',
	
		];
	
		public function validate($command)
		{
			parent::validate($command); // calling the parent  validtion function becasuse there is one more validate function hence do this
		}
	
	
	}





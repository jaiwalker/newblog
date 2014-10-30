<?php
	/**
	 * Created by [id].
	 * User: JayKay
	 * Date: 4/09/2014
	 * Time: 3:15 PM
	 * FileName : RegistrationForm.php
	 */

	namespace Jai\Blog\Acmew\Blogs;


	use Laracasts\Validation\FormValidator;

	class BlogsForm extends FormValidator
	{

		protected $rules = [
			'name'    => 'required',
			'description' => 'required',
			'author' => 'required',

		];

	}
<?php

	use Acmew\Blogs\Events\BlogPublished;
	use Laracasts\Commander\Events\EventGenerator;

	class Blog extends \Eloquent
	{

		use EventGenerator;

		protected $fillable = array('name',
		                            'description',
		                            'author');
		protected $table    = 'blogs';

		/**
		 * @param $name
		 * @param $description
		 * @param $author
		 * @return static
		 */
		public static function publish($name, $description, $author)
		{
			$blog = new static(compact('name', 'description', 'author'));  //ass need to be passed as array

			$blog->raise(new BlogPublished($blog));

			return $blog;
		}
		
		public function comments()
		{
			return $this->hasMany('comment');
		}

	}
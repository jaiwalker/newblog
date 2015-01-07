<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 17/09/2014
 * Time: 12:12 PM
 * FileName : PublishBlogCommandHandler.php
 */

namespace Jai\Blog\Acmew\Blogs;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Jai\Blog\Models\Blog;


class PublishBlogCommandHandler implements CommandHandler{

		use DispatchableTrait;

		protected $repository;

		function __construct(BlogRepository $repository)
		{
			$this->repository = $repository;
		}
		/**
		 * Handle the command
		 * @param $command
		 * @return mixed
		*/public function handle($command)
		{

			$blogs = Blog::publish(
				$command->name,$command->description,$command->author
				);

			$this->repository->save($blogs);

			//DominEvents
			//$events= $blogs->releaseEvents(); // Grabbing the  all events  example contains [blogPublished ] Event

			$this->dispatchEventsFor($blogs);  // No need to use  the above line as we have got  events releasing  in this function

			return $blogs;

		}
}
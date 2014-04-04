<?php
namespace Explore;
use View;

class PublicProjectController extends \BaseController {


	public function get_index()	{

		$user = \Sentry::getUser();
		$projects = \project::paginate(8);

		return View::make('site/explore/publicprojects/index')
	   					->with('user', $user)
	   					->with('projects', $projects);
			   	    	
	}

}

	
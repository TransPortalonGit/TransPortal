<?php
namespace Profile;
use View;

class ProjectController extends \BaseController {


	public function getIndex()	{
		$user = \Sentry::getUser();
		$projects = \project::where('user_id', '=', $user->id)->get();
		$username = $user->username;

	    return View::make('site/profile/projects/index')
	    		->with(array('projects' => $projects, 'user' => $user, 'username' => $username));	  	    	
	}

}
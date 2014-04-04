<?php

class ProfileController extends BaseController {


	public function getIndex()	{
	    return Redirect::to('/');	    	
	}


	
	public function getShow($username) {

		$usersinlab = User::where('inlab', '=', 1)->get();
		$user = User::where('username', '=', $username)->firstOrFail();
		$projects = \project::where('user_id', '=', $user->id)->get();
		
		return View::make('site/profile/index')
			   	->with('user', $user)
			   	->with('username', $username)
			   	->with('projects', $projects)
			   	->with('usersinlab', $usersinlab);

	}
	
}
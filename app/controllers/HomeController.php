<?php

class HomeController extends BaseController {

	public function getIndex()	{
		$usersinlab = User::where('inlab', '=', 1)->get();
		$projects = project::all();

	    return View::make('site/home/index')
	    			->with('projects', $projects)
	    			->with('usersinlab', $usersinlab);
	}

}

?>
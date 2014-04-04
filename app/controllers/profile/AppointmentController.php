<?php
namespace Profile;
use View;

class AppointmentController extends \BaseController {


	public function get_index()	{

		$currentuser = \Sentry::getUser();
		$username = $currentuser->username;

	    return View::make('site/profile/appointments/index')
			   	->with('user', \Sentry::getUser())
			   	->with('username', $username);	    	
	}

}
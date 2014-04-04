<?php

Route::controller('home', 'HomeController');
Route::controller('explore/tutorials', 'explore\TutorialController');
Route::controller('explore/publicprojects', 'explore\PublicProjectController');
Route::controller('inventory', 'InventoryController');
Route::controller('projects', 'ProjectController');
Route::controller('profile/setting', 'profile\SettingController');
Route::controller('profile/passwordchange', 'profile\PasswordController');
Route::controller('tutorials', 'TutorialController');
Route::controller('help/home', 'HelpController');
Route::controller('help/query', 'QueryController');
Route::controller('explore/tools', 'explore\ToolController');
Route::controller('home/new', 'OtherHomeController');


Route::controller('profile/appointments', 'profile\AppointmentController');
Route::controller('profile/inventory', 'profile\InventoryController');
Route::controller('profile/usagedata', 'profile\UsageDataController');
Route::controller('profile/projects', 'profile\ProjectController');
Route::controller('profile', 'ProfileController');

Route::controller('account', 'AuthController');

Route::group(array('before' => 'auth.admin'), function()
{
Route::controller('admin/inventory', 'admin\InventoryController');
Route::controller('admin/calendar', 'admin\CalendarController');
Route::controller('admin/users', 'admin\UserController');
Route::controller('admin/dashboard', 'admin\DashboardController');
Route::controller('admin/analytics', 'admin\AnalyticsController');
Route::controller('admin', 'admin\HomeController');
});

Route::get('/', function() {
	return Redirect::to('/home');
});

Route::get('/team/abouttransportal', function() {
	return View::make('/site/team/about_transportal_bremen');
});

Route::get('/latestnews/news', function() {
	return View::make('/site/latestnews/news');
});



// Filters

Route::filter('isadmin?', function()
{

})

?>
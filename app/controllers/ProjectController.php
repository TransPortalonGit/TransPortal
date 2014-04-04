<?php

class ProjectController extends BaseController {

	public function getIndex()	{
		$projects = project::orderBy('created_at', 'desc')
			->with('user')
			->paginate(25);
	    return View::make('site/project/index')->with('projects', $projects);

	}

	public function getCreate()	{
		
		if(!Sentry::check()) 
		{
			return Redirect::to('/account/login');
		} 
		else 
		{
	    return View::make('site/project/create');
		}
	}

	public function getDownload($pid) {
		
		$project = project::where('id', '=', $pid)->firstorfail();
		$docs = explode(',', $project->docs);

		$files = array();
		
		if($docs) {
			foreach($docs as $doc)
				array_push($files, $doc);
		}

		$zip = new ZipArchive();

		$tmp_file = tempnam('.','');
		$zip->open($tmp_file, ZipArchive::CREATE);
		
		# curl instead of traditional file_get_contents because of error...
		function curl_get_contents($url)
		{
		  $curl = curl_init($url);
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		  $data = curl_exec($curl);
		  curl_close($curl);
		  return $data;
		}

		# loop through each file
		foreach($files as $file) {

	    # download file
	    $download_file = curl_get_contents($file);

	    # add it to the zip
	    $zip->addFromString(basename($file),$download_file);

		}
		
		$zip->close();

		header('Content-disposition: attachment; filename=' . $project->title . '_files.zip');
		header('Content-type: application/zip');
		readfile($tmp_file);

	}


	public function postCreate()	{
	
		$rules = array(
			'title' => array('required', 'min:7'),
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
	        return Redirect::to('/projects/create')->withErrors($validator);
		}
		
		$project = new project;			
	    $project->title = trim(Input::get('title'));
	    $project->content = self::_cleanRTEHTML(Input::get('content'));
	    $project->user_id = Sentry::getUser()->id;
		$project->save();	
		

		$id = $project->id;
		
		$base_folder = "/uploads/projects/" . $id;
		$image_folder = $base_folder . "/images";
		$file_folder = $base_folder . "/files";
		$thumbnail_folder = $base_folder . "/thumbnail";

		$folders = array(
			public_path() . $base_folder,
			public_path() . $image_folder,
			public_path() . $file_folder,
			public_path() . $thumbnail_folder
		);
		
		foreach ($folders as $folder) {
			if (!file_exists($folder)) mkdir($folder, 0777, true);
		}

		// The "files" correspond to images and the "docs" to files.

		// Images
		$files_uploaded = array();
		$files_json = "";
		
		if ( Input::file('file') ) {
			$files = Input::file('file');
			foreach ($files as $file) {
				if (!empty($file)) {
					$ext = File::extension($file->getClientOriginalName());
					$uid = time() . uniqid() . '.' . $ext;
					$file_link = $image_folder . "/" . $uid;
					$file->move(public_path() . $image_folder, $uid);
					array_push($files_uploaded,  $file_link);
				}
			}
		}

		$files_json = (Input::file('file')) ? implode(',', $files_uploaded) : '';
		$project->files = $files_json;

		// Files - PATH and NAMES
		$docs_uploaded = array();
		$docs_json = "";
		$docs_names = array();
		$docs_json_names = "";
		
		if ( Input::file('doc') ) {
			$docs = Input::file('doc');
			foreach ($docs as $doc) {
				if (!empty($doc)) {
					$ext = File::extension($doc->getClientOriginalName());
					$name = $doc->getClientOriginalName();
					$uid = time() . uniqid() . '.' . $ext;
					$doc_link = $file_folder . "/" . $uid;
					$doc->move(public_path() . $file_folder, $uid);
					array_push($docs_uploaded,  $doc_link);
					array_push($docs_names, $name);
				}
			}
		}

		$docs_json_names = (Input::file('doc')) ? implode(',', $docs_names) : '';
		$docs_json = (Input::file('doc')) ? implode(',', $docs_uploaded) : '';
		$project->docs = $docs_json;
		$project->docnames = $docs_json_names;
		
		// Save
		$project->save();	
		
		return Redirect::to('/projects/show/' . $id)->with('success', 'Project successfully saved!');
	}
	
	
	public function postEdit()	{

		$id = Input::get('_id');
		$project = project::find($id);

		$rules = array(
			'title' => array('required', 'min:7'),
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
	        return Redirect::to('/projects/edit/' . $id)->withErrors($validator);
		}



		$base_folder = "/uploads/projects/" . $id;
		$image_folder = $base_folder . "/images";

		$folders = array(
			public_path() . $base_folder,
			public_path() . $image_folder
		);
		
		foreach ($folders as $folder) {
			if (!file_exists($folder)) mkdir($folder, 0755, true);
		}
		
		$files_project = array();
		$files_project = explode(',', $project->files);
		$files_uploaded = array();
		$files_existing = (Input::get('existing_file') ) ? Input::get('existing_file') : array();
		$files_merged = array();
		$files_json = "";
		
		if ( Input::file('file') ) {
			$files = Input::file('file');
			foreach ($files as $file) {
				if (!empty($file)) {
					$ext = File::extension($file->getClientOriginalName());
					$uid = time() . uniqid() . '.' . $ext;
					$file_link = $image_folder . "/" . $uid;
					$file->move(public_path() . $image_folder, $uid);
					array_push($files_uploaded,  $file_link);
				}
			}
		}
		
		if (!empty($files_project) )	{			
			$files_existing_removed = array_diff($files_project, $files_existing);
			foreach ($files_existing_removed as $file_existing_removed) {
				File::delete(public_path() . $file_existing_removed);
			}
		}
		
		$files_project = $files_existing;

		if (!empty($files_project) && !empty($files_uploaded)) {
			$files_merged = array_merge( $files_project, $files_uploaded );
		} else if (!empty($files_project)) {
			$files_merged = $files_project;
		} else if (!empty($files_uploaded)) {
			$files_merged = $files_uploaded;
		}

		$files_json = ($files_merged != "") ? implode(',', $files_merged) : '';

		$project->title = Input::get('title');
		$project->content = Input::get('content');
		$project->files = $files_json;

		$project->save();
				
		return Redirect::to('/projects/show/' . $project->id)->with('success', 'Project successfully updated!');

	}
	
	public function getShow($id)	{
		
		$project = project::with('user')->find($id);
		$user = user::where('id', '=', $project->user_id)->firstorfail();
		$project->content = self::_cleanRTEHTML($project->content);
		$usersprojects = project::where('user_id', '=', $user->id)->get();

		// The user who is currently logged in
		$currentuser = Sentry::getUser();

		// Project stats - VIEWS
		if(!Sentry::getUser() || $currentuser->id != $user->id) {
			$project->views = $project->views + 1;
			$project->save();
		} 

	    return View::make('site/project/show')
	    	->with('project', $project)
	    	->with('usersprojects', $usersprojects)
	    	->with('user', $user);
	}
	
	public function getEdit($id)	{
		$project = project::find($id);
		$project->content = self::_cleanRTEHTML($project->content);

	    return View::make('site/project/create')
	    	->with('project', $project);
	}
		
		
	public function postDelete() {
		$id = Input::get('_id');

		$project = project::find($id);
		$project->delete();
		
		File::deleteDirectory(public_path(). "/uploads/projects/" . $id);
		return Redirect::to('/projects')->with('success', 'Project successfully deleted!');
	}

	
	private function _cleanRTEHTML($string) {
		$pattern = ':<[^/>]*>\s*</[^>]*>:';
		$string = preg_replace($pattern, '', $string);
		$string = preg_replace(':style="(.*)":', '', $string);
		$string = preg_replace(':id="(.*)":', '', $string);
		return trim($string);
	}
	

}
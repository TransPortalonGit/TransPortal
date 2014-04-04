<?php

class Project extends Eloquent {

	protected $table = 'projects';

	public  $timestamps = true;
	
	public function user()
    {
        return $this->belongsTo('User');
    }	

}
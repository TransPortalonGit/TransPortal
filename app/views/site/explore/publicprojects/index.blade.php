@extends('layouts.master')

@section('content')
<div id="browse-header" style="margin-top: 30px">
    
    <div id="project-sorter">
      <select class="form-control" style="border: 1px solid #ddd;">
        <option>All</option>
        <option>Most recent</option>
        <option>Most comments</option>
        <option>Most favorites</option>
      </select>
    <div>
      <form class="navbar-form" role="search" style="display: inline; margin-left: 20px; ">
          <div class="form-group" >
             <input type="text" class="form-control" placeholder="Search" style="border-radius: 0; height: 32px; border: 1px solid #ddd;">
          </div>
            <button type="submit" class="btn btn-default" style="border-radius: 0;">Submit</button>
      </form> 
      </div>       
    </div>
  </div>

 
    
  
  <!-- Popular project Thumbnails -->
  <div class=" low  row" style="padding:0; margin:0; margin-top: 20px;">
    <div class="all_projects"  >
      @foreach($projects as $project)  
      <!--single thumbnail-->
        <div class="thumbnail_shot col-xs-3 col-md-3">
          <a href="/projects/show/{{$project->id}}" >
              <?php 
              $files = explode(",", $project->files);
              $file = $files[0];
              ?>
              @if(empty($file))
              <img src="/img/images.jpg">
              @else
              <img src="{{$file}}">
              @endif
              <div id="img_ribbon"> {{ $project->title }} </div></a>
              <div class="caption_wrapper">
                          
                <ul class="caption">         
                  <li><i class="fa fa-eye"></i> {{ $project->views }} </li>
                  <li><a href="#"><i class="fa fa-comment"></i> {{ $project->comment_count }} </a></li>
                  <li><a href="#"><i class="fa fa-heart"></i> {{ $project->favorite }} </a></li>
                </ul>
            </div>              
            </div>
       <!--/single thumbnail-->
       @endforeach
    </div>
  </div>    


  {{$projects->links()}}
    <!--Thumbnails end here -->
    <p>123456</p>

  
	
@stop
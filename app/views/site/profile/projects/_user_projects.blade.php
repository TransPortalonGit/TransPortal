
<!--This is the My Projects of Project tab-->
  

  <div style="margin-top:10px;">
   
    <p style="width: 100px; display: inline;"> My Projects ({{ count($projects) }})</p>
    <a href="/projects/create" style="float: right; width: 100px; display: inline-block;" title="Add new project">
     <div class="add_project_btn"> 
        <i class="fa  fa-plus-circle"></i> Add project
      </div>
    </a>
     
      
        
  </div> 
   <hr style="width: 100% !important;">
   
   

<!-- All Project Thumbnails -->
<div class="all_projects row" style="margin:0; padding-left: 2%; ">
  @foreach($projects as $project)

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
                <div class="edit-project">
                  <a href="/profile/setting"><i class="fa fa-edit" title="Edit"></i> Edit</a>
                </div>          
                <ul class="caption">         
                  <li><i class="fa fa-eye"></i> {{ $project->views }} </li>
                  <li><a href="#"><i class="fa fa-comment"></i> {{ $project->comment_count }} </a></li>
                  <li><a href="#"><i class="fa fa-heart"></i> {{ $project->favorite }} </a></li>
                </ul>
          	</div>      
      	  </div>

  @endforeach

 
  </div>
  <div class="pagi">
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
</div>
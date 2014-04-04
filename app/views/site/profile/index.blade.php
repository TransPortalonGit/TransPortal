@extends('layouts.master')

@section('content')



	
		
		<div class="content_container container">
			@include('site.profile._user_profileheader')


			@if (Sentry::Check() && Sentry::getUser()->username == $username)
				@include('site.profile._user_navigation')
			@endif

			<!--This is the My Recent Projects of dashboad page-->
			<div>
				<div style="margin-top:10px;">
				    <p> My Recent Projects</p>
				    <hr>
				</div>

				<!-- Project Thumbnails -->			
				
				<div class="low  row" style="margin:0; padding-left: 2%;" >
				
				    <div class="all_projects" >
				      <!--single thumbnail-->
				        @foreach($projects->slice(-4, 4) as $project)
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
						  @endforeach
						
					   <!--/single thumbnail-->
						      
				</div>

  				</div> 
			</div>
		
			<!-- Newsfeed-->
			
			
			    <h5><a href="#">My Newsfeed</a></h5>
			    <hr>
			    
			   
				<div class="btn-group">
			      <button type="button" class="btn btn-default">All Newsfeed</button>
			      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			        <span class="caret"></span>
			        <span class="sr-only">Toggle Dropdown</span>
			      </button>
			      <ul class="dropdown-menu" role="menu">
			        <li><a href="#">Comments</a></li>
			        
			        <li><a href="#">Following</a></li>
			         
			        <li><a href="#">Inventory</a></li>
			         
			        <li><a href="#">Appointment</a></li>      
			        
			      </ul>
		   		</div><!-- /btn-group -->

			 
			    <!-- Comments Section starts here -->
		
	      			<div>
				        <table>
				          <td>
				            <div  class="commentPic">
				              <a href="#">
				                <img src="/uploads/projects/46/images/1394562268531f54dc1047f.jpg"></a>
				            </div>
				          </td>
				          <td>
				            <div class="commentName">
				              <h5><strong>Sabirina</strong></h5>
				              <p>This project is so wow. Such beauty. So doge. Much like.</p>
				            </div>
				          </td>
                               </table>
                          <table>
				          
                         <td>
				            <div  class="commentPic">
				              <a href="#">
				                <img src="/profile-pics/139418594076.jpg"></a>
				            </div>
				          </td>
				          <td>
				            <div class="commentName">
				              <h5><strong>Dennis</strong></h5>
				              <p>Love your projects! The whole branding is great too :)</p>
				            </div>
				          </td>
				          
			        	</table>
			        	 <table>
				          
                         <td>
				            <div  class="commentPic">
				              <a href="#">
				                <img src="/uploads/projects/29/images/1394446524531d90bc5a37b.jpg"></a>
				            </div>
				          </td>
				          <td>
				            <div class="commentName">
				              <h5><strong>Bernd</strong></h5>
				              <p>Great work! Would like to see more of your projects! Spring is coming. Hooray!!! </p>
				            </div>
				          </td>
				          
			        	</table>
		      		</div>
	      			
				<div class="pull-right">
				  <a href="#"> More
				    <i class=" fa fa-chevron-right"></i>
				  </a>
				  <span class="hide">likes</span>
				</div>
				<!--COMMENTS END HERE-->

			
			</div>
		

      	
   
			<!-- CONTENT ENDS HERE -->
	

<style type="text/css">

a {
color: #333;
text-decoration: none;
}
a:hover{
	color:#333;
}
.form-control {
border: 1px solid ;



}


.btn-group>.btn{
	border-radius: 0;

}
.btn-group> ul.dropdown-menu > li > a:hover {

background-color: #E2E2E2;
color:#333;

}
</style>

@stop
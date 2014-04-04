@extends('layouts.master')


@section('head')

<script type="text/javascript">

$(document).ready(function () {

});

</script>

@stop

@section('content')



<style type="text/css">

 .main-project-photo a > img, #highlight-photo img {
  width: 620px !important;
  height: auto;
  border: 10px solid #ffffff;
}


</style>
 <div class="content_container container">
 	<div id="profile_head">
    <div class="brief_profile ">
        <a href="/profile/show/{{$project->user->username}}">              
         <img src="/profile-pics/{{$user->profile_pic}}" class="img-responsive img-thumbnail" alt="Responsive image"></a>
    </div>
    <span>
      <div>
      <h4>{{$project->title}}</h4>
             </div> </br>
     <div class="">
       <p>by <a href="/profile/show/{{$project->user->username}}">{{$project->user->username}} </a> , published <em>{{date("d.m.Y", strtotime($project->created_at));}}</em> <span style="padding-left: 10px;"><a href="#" style="color: #34a26a;"><i class="fa  fa-pencil-square-o"></i> Edit </a></span></p> 
</div>
    </span>
  </div>
 	<div class="body_wrapper container">
    <div id="first_col">
        <div id="img_gallery"> 
         <?php $Allfiles = explode(',', $project->files); 
           $files = array_slice($Allfiles, 0, 1); 
         ?>  

      			@foreach ($files as $file) 
                 
                  <div class="main-project-photo">
                      <a href="{{$file}}"> <img src="{{$file}}" /></a>
                  </div> 
                  <div id="highlight-photo"></div>      			
      			@endforeach  

    <!--Carousel for project image-->      
      
     
      <div class="carousel-wrapper" style="padding: 0; margin:0;">
             
                <div id="myCarousel" class="carousel slide">
                    
                    <!-- Carousel items -->
                    <div class="carousel-inner">                      
                        
                        <!--item-->
                        <div class="item active">
                            <div class="row">
                                <?php 
                                  $thumb_imgs = array_slice($Allfiles, 0, 4); 
                                  
                                ?>  
                              <ul style="list-style: none; display: inline-block; width: 600px;"> 
                                @foreach ($thumb_imgs as $thumb_img)
                                 
                               
                                  <li style= "width: 135px; display: inline-block; padding: 5px;" class="carousel-thumb"><a href="{{$thumb_img}}"><img id="{{$thumb_img}}" src="{{$thumb_img}}" alt="Image" ></a>

                                </li>
                             

                                
                                @endforeach 
                              </ul> 
                            </div>
                            <!--/row-->
                        </div>
                        <!--/item-->
                        <!--item-->
                        <div class="item">
                            <div class="row">
                                <?php 
                                  $thumb_imgs = array_slice($Allfiles, 4,4); 
                                  
                                ?>  
                              <ul style="list-style: none; display: inline-block; width: 600px; padding: 5px;"> 
                                @foreach ($thumb_imgs as $thumb_img)
              
                                  <li style= "width: 135px; display: inline-block; padding: 5px;" class="carousel-thumb"><a href="{{$thumb_img}}"><img id="{{$thumb_img}}" src="{{$thumb_img}}" alt="Image" ></a>

                                </li>
                  
                                @endforeach 
                              </ul> 
                            </div>
                            <!--/row-->
                        </div>
                        <!--/item-->

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>

                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                    </div>
                    <!--/carousel-inner-->                 
  
                </div>

                <!--/myCarousel-->
     
      </div>

     

  
    <!--/Carousel for project image-->     
          
      </div>

 
      <div id="project-info">
        <h4>Project Description</h4>
       <p>{{$project->content}}</p>
      </div>
      <div id="comment_section">
            @if ( $project->comment_count < 1 )
              <h5>No comment yet</h5>
              <hr>
            @else 
                  <a href="#" title="view all comments"><h5>Commments {{ $project->comment_count }}</h5></a>
                  <hr>

                  <table>
                    <td>
                      <div  class="commentPic">
                        <a href="#">
                          <img src="/img/doge.jpg"></a>
                      </div>
                    </td>
                    <td>
                      <div class="commentName">
                        <h5>Doge</h5>
                        <p>This project is so wow. Such beauty. So doge. Much like.</p>
                      </div>
                    </td>

                  </div>
                </table>

                <div class="timeStampe row">

                  <div class="commentTime">
                    20 min ago
                    <a href="#">| like?</a>
                    <a href="#" class="pull-right"> <i class="fa fa-heart ">2</i>
                    </a>
                  </div>

                </div>
                <hr>
            @endif
        </div>
  </div>
  <div id="second_col">
    <p> <strong> Tags:</strong></p>
      <div class="project_tag">
            
            <span><a href="#">3D</a></span>    
            <span><a href="#">DIY</a></span>    
            <span><a href="#">Hipster</a></span>    
            <span><a href="#">3D</a></span>    
            <span><a href="#">2D</a></span>  
            
      </div>

      <div class="stats">
            <ul>
              <li>
                <table>                  
                  <tr> 
                  <td class="name" title="Like this project"> <a href="#"> <i class="fa fa-heart"></i> Likes </a></td>
                  <td class="quant"> <a href="#">{{ $project->favorite }}</a> </td>               
                  </tr>                   
                </table>               
              </li>
              <hr>
              <li>
                <table>
                  <tr>
                  <td class="name" title="Comment on this project"> <a href="#"><i class="fa fa-comment"></i> Comment </a></td>
                  <td class="quant"><a href="#">{{ $project->comment_count }}</a></td>
                  </tr>
                </table>               
              </li>
              <hr>
              <li>
                <table>
                  <tr>
                  <td class="name" title="number of views"> <a href="#"> <i class="fa fa-eye"></i> Views </a></td>
                  <td class="quant"><a href="#">{{ $project->views }}</a></td>
                  </tr>
                </table>               
              </li>
              <hr>
              <li>
                <table>
                  <tr>
                  <td class="name" title="Share this project"><a href="#"> <i class="fa fa-share-square-o"></i> Shares</a></td>
                  <td class="quant"><a href="#">14</a></td>
                  </tr>
                </table>               
              </li>
              
            </ul>
      </div>

      <div class="project_download">
        <p> <strong> Files:</strong> </p>
        @if($project->docs != "")
          <?php
          $docs = array();
          $docnames = array();
          if ($project->docs != "") $docs = explode(',', $project->docs);
          if ($project->docnames != "") $docnames = explode(',', $project->docnames);
          $i = 0;
          ?>
          <ul class="media-list" style="height: 115px; overflow: scroll; font-size: 13px;">
          @foreach($docnames as $docname)
            <li style="width: 100%; display: inline-block;">
            <div id="file_name"> 
              <p>{{$docname}}</p>
              <a href="{{$docs[$i]}}" target="_blank" title="Download file" download="{{$project->title}} - {{$docname}}"> <i class="fa fa-download" style="font-size: 16px"></i></a>   </div>
            </li>
            <?php $i = $i + 1; ?>       
          @endforeach
        </ul>
      </div>
      <div id="download_area">
        <div id="license_type">
          <a href="#"><img src="/img/cc-icons-png/by.png"></a>
          <a href="#"><img src="/img/cc-icons-png/cc.png"></a>
          <a href="#"><img src="/img/cc-icons-png/nc.png"></a>
        </div>
        <?php $pid = $project->id; ?>
        <form method="GET" action="/projects/download/{{$pid}}" enctype="multipart/form-data">
        <div id="download_all">
          <button type="submit" style=" border-radius:0;" class="btn btn-primary" title="Download all project files">Download All</button>
        </div>
        </form>
      </div>
      @else
      <button class="btn btn-default; disabled" > No files submitted. </button>
      <br>
      @endif

      <div id="project_more">
        <p><strong><a href="#" title="Click to view all projects">More projects from {{$project->user->username}}</a></strong></p>
        <hr>
        <div id="more_thumbnail">
          <ul>
            @foreach($usersprojects as $usersproject)


            <li>

   
            <a href="/projects/show/{{$usersproject->id}}" >
              <?php 
              $files = explode(",", $usersproject->files);
              $file = $files[0];
              ?>
              @if(empty($file))
              <img src="/img/images.jpg">
              @else
              <img src="{{$file}}">
              @endif
             </a>
             


 
            </li>
             @endforeach

           
           



          </ul>

        </div>


      </div>


  </div>
   

</div>

	

  <script type="text/javascript">
           $('#myCarousel').carousel({
            interval: 2000
          })

          $('.carousel .item').each(function(){
            var next = $(this).next();
            if (!next.length) {
              next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            if (next.next().length>0) {
              next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
              $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
          });
      </script>
    <!--
      <script type="text/javascript"> 
        $(function(){
            $(".main-project-photo").show();
            var thumb_id = "{{$thumb_img}}";
            $(".carousel-thumb").on("click", function(){
            $(".main-project-photo").hide();
           
            var elem = document.createElement("img");

               elem.src = document.getElementById("{{$thumb_img}}").src;
            //elem.src = "/img/penny.jpg"

               
                document.getElementById("highlight-photo").appendChild(elem);
               

            });
        });
    </script>

-->






@stop
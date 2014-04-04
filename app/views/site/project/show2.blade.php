@extends('layouts.master')


@section('head')
<script type="text/javascript">

$(document).ready(function(){
	
		
});

</script>
@stop

@section('content')
<div id="profile_head">
    <div class="brief_profile">
        <a href="#">              
         <img src="img/profile_img.png" class="img-responsive img-thumbnail" alt="Responsive image"></a>
    </div>
    <span>
      <h3>Tetrahedral Building Blocks</h3>
       <p>by <a href="#"> Supperman</a> , published <em>10 Oct 2013</em></p>      
    </span>
</div>

<div class="body_wrapper container">
    <div id="first_col">
        <div id="img_gallery">    
            <div class="highlight_photo"> <a href="#"> <img src="img/glass.jpg"></a></div>
	            
	      <!-- TEST CAROUSEL HERE -->
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

			<div class="carousel-wrapper">
			    <div class="col-xs-12">       
			          <div id="myCarousel" class="carousel slide">
			              
			              <!-- Carousel items -->
			              <div class="carousel-inner">
			                  <div class="item active">
			                      <div class="row">
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb3.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb4.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb2.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb1.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                      </div>
			                      <!--/row-->
			                  </div>
			                  <!--/item-->
			                  <div class="item">
			                      <div class="row">
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb5.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb6.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb2.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#x"><img src="img/thumb1.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                      </div>
			                      <!--/row-->
			                  </div>
			                  <!--/item-->
			                  <div class="item">
			                      <div class="row">
			                          <div class="col-xs-3"><a href="#"><img src="img/thumb3.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#"><img src="img/thumb4.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#"><img src="img/thumb2.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                          <div class="col-xs-3"><a href="#"><img src="img/thumb1.jpg" alt="Image" class="img-responsive"></a>
			                          </div>
			                      </div>
			                      <!--/row-->
			                  </div>
			                  <!--/item-->
			              </div>
			              <!--/carousel-inner--> 
			              <div> 
			                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
			                  <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
			              </div>
			          </div>
			          <!--/myCarousel-->
			    </div>
			</div>
		</div>
      <div id="project-info">
        <h4>Project Description</h4>
        <p>However, if you want to build your own user interface, it is possible to use only the basic plugin version and a minimal setup.The following is an alternative to index.html with only the minimal requirements and a simple done callback handler (see API and Options on how to use the different options and callbacks)</p>
      </div>
      <div id="comment_section">
          <a href="#" title="view all comments"><h5>Commments (3)</h5></a>
          <hr>
        <table>
		    <td>
		      <div  class="commentPic">
		        <a href="#">
		          <img src="img/doge.jpg"></a>
		      </div>
		    </td>
		    <td>
		      <div class="commentName">
		        <h5>Doge</h5>
		        <p>This project is so wow. Such beauty. So doge. Much like.</p>
		      </div>
		    </td>                 
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
	                  <td class="quant"> <a href="#">10</a> </td>               
	                  </tr>                   
	                </table>               
	              </li>
	              <hr>
	              <li>
	                <table>
	                  <tr>
	                  <td class="name" title="Comment on this project"> <a href="#"><i class="fa fa-comment"></i> Comment </a></td>
	                  <td class="quant"><a href="#">23</a></td>
	                  </tr>
	                </table>               
	              </li>
	              <hr>
	              <li>
	                <table>
	                  <tr>
	                  <td class="name" title="number of views"> <a href="#"> <i class="fa fa-eye"></i> Views </a></td>
	                  <td class="quant"><a href="#">47</a></td>
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
	        <div id="file_name"> 
	          <p>Project files.svg</p>
	          <a href="#" title="Download file"> <i class="fa fa-download" style="font-size: 16px"></i></a>         
	        </div>       
	      </div>
	       <!--another download button as example-->
	        <br>
	      <div class="project_download">
	        <div id="file_name"> 
	          <p>Hipster Glass.3ds</p>
	          <a href="#" title="Download file"> <i class="fa fa-download" style="font-size: 16px"></i></a>         
	        </div>
	      </div>
	      <!--another download button ends here-->
	      <div id="download_area">
		      <div id="license_type">
		          <a href="#"><img src="img/cc-icons-png/by.png"></a>
		          <a href="#"><img src="img/cc-icons-png/cc.png"></a>
		          <a href="#"><img src="img/cc-icons-png/nc.png"></a>
		      </div>
		        <div id="download_all">
		          <button type="button" class="btn btn-primary" data-toggle="button" title="Download all project files">Download All</button>
		        </div>
	      </div>

	      <div id="project_more">
	        <p><strong><a href="#" title="Click to view all projects">More projects from Supperman</a></strong></p>
	        <hr>
	        <div id="more_thumbnail">
	          <ul>
	            <li>
	              <a href="#"><img src="img/thumb5.jpg"></a>
	              <a href="#"><img src="img/thumb2.jpg"></a>
	              <a href="#"><img src="img/thumb6.jpg"></a>
	            </li>

	            <li>
	              <a href="#"><img src="img/thumb7.jpg"></a>
	              <a href="#"><img src="img/thumb8.jpg"></a>
	              <a href="#"><img src="img/thumb1.jpg"></a>
	            </li>
	          </ul>
	        </div>
	      </div>
	  </div>

</div>


@stop
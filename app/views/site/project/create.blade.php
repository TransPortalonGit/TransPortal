@extends('layouts.master')

@section('head')

{{HTML::style('/css/redactor.css')}}
{{HTML::style('/css/redactor.bootstrap.css')}}
{{HTML::script('/js/redactor.min.js')}}

{{HTML::style('/css/bootstrap-fileupload.min.css')}}
{{HTML::script('/js/bootstrap-fileupload.min.js')}}



<script type="text/javascript">

var icid = 1;

$(document).ready(function(){


	
});


$(function(){
	$('#redactor_content').redactor({
		imageUpload: '/projects/imageupload',
		//fileUpload: '/projects/fileupload',
		//imageGetJson: '/projects/getjson',
		//linebreaks: true,
		paragraphy: false,
		toolbarFixed: false,
		toolbarFixedTopOffset: 75, 
		buttons: ['bold', 'italic', 'underline', '|',
'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'html' ],
		wym: false,
	    allowedTags: ['p', 'b', 'strong', 'i', 'u', 'ul', 'ol', 'li', 'dl', 'dt', 'dd'],

		//formattingTags: ['h2', 'h3', 'p' ],
		langs: {
				en: {
					html: 'HTML',
					video: 'Insert Video',
					image: 'Insert Image',
					link: 'Link',
					link_insert: 'Insert link',
					unlink: 'Unlink',
					formatting: 'Formatting',
					paragraph: 'Normal text',
					quote: 'Quote',
					code: 'Code',
					header2: 'Section',
					header3: 'Heading',
					bold: 'Bold',
					italic: 'Italic',
					unorderedlist: 'Unordered List',
					orderedlist: 'Ordered List',
					outdent: 'Outdent',
					indent: 'Indent',
					cancel: 'Cancel',
					insert: 'Insert',
					save: 'Save',
					_delete: 'Delete',
					rows: 'Rows',
					columns: 'Columns',
					add_head: 'Add Head',
					delete_head: 'Delete Head',
					title: 'Title',
					image_position: 'Position',
					none: 'None',
					left: 'Left',
					right: 'Right',
					image_web_link: 'Image Web Link',
					text: 'Text',
					mailto: 'Email',
					web: 'URL',
					video_html_code: 'Video Embed Code',
					file: 'Insert File',
					upload: 'Upload',
					download: 'Download',
					choose: 'Choose',
					or_choose: 'Or choose',
					drop_file_here: 'Drop file here',
					align_left: 'Align text to the left',
					align_center: 'Center text',
					align_right: 'Align text to the right',
					align_justify: 'Justify text',
					horizontalrule: 'Add Section',
					deleted: 'Deleted',
					anchor: 'Anchor',
					link_new_tab: 'Open link in new tab',
					underline: 'Underline',
					alignment: 'Alignment',
					filename: 'Name (optional)',
				}
		},
		
	});
});


function delete_project() {
	bootbox.confirm("<h3>Do you really want to delete this project?</h3>", function(result) {
		if (result) {
			$("form").attr("action", "/projects/delete");
			$("form").submit();
		}
	}); 
}


function remove_image(id) {
	$(id).parent().remove();
/*
	$('#icid-' + id).fileupload('clear');
	$('#icid-' + id).remove();
	*/
}

function remove_image2(id) {
	$(id).parent().remove();
}

function add_image() {
	var output = "";
	output += '<div class="pull-left image-container">';
	output += '<div class="fileupload fileupload-new" data-provides="fileupload">';
	output += '<div class="fileupload-new thumbnail"><i class="fa fa-picture-o"></i></div>';
	output += '<div class="fileupload-preview fileupload-exists thumbnail"></div>';
	output += '<br />';
	output += '<span class="btn btn-file"><span class="fileupload-new"><i class="fa fa-upload"></i></span><span class="fileupload-exists">Change</span><input type="file" name="file[]" /></span>';
	output += ' <button type="button" onclick="remove_image(this);" class="btn btn-danger" title="Remove photo"><i class="fa fa-trash-o"></i></button>';
	output += '</div>';
	output += '</div>';
	$('#add-image-btn').before(output);
	icid++;
}

function add_file() {
	var output = "";
	output += '<div class="pull-left image-container">';
	output += '<div class="fileupload fileupload-new" data-provides="fileupload">';
	output += '<div class="fileupload-new thumbnail"><i class="fa fa-file-text-o"></i></div>';
	output += '<div class="fileupload-preview fileupload-exists thumbnail"></div>';
	output += '<br />';
	output += '<span class="btn btn-file"><span class="fileupload-new"><i class="fa fa-upload"></i></span><span class="fileupload-exists">Change</span><input type="file" name="doc[]" /></span>';
	output += ' <button type="button" onclick="remove_image(this);" class="btn btn-danger" title="Remove photo"><i class="fa fa-trash-o"></i></button>';
	output += '</div>';
	output += '</div>';
	$('#add-file-btn').before(output);
	icid++;
}


</script>
        
@stop

<?php
/*
@section('page_header')
	<i class="icon-book"></i> <a href="/projects">Projects</a> <i class="icon-angle-right"></i> Create new project
@stop
*/
?>

@section('content')
{{Form::open(array('enctype' => "multipart/form-data"))}}


{{ (isset($project)) ? Form::hidden('_id', $project->id) : '' }}
	
	<div class="container-wrapper row">
		<div class="span11">
			<div class="create_title">
		        <p>Create a new project</p>
			</div>
			<h4>Title:</h4>

			<fieldset>
				
				{{Form::text('title', (isset($project)) ? $project->title : '' , array(
					'placeholder' => 'Title',
					'class' => 'span11',
				));}}
				
				{{ ($errors->first('title')) ? '<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Please provide a title</p>': ''}}

			</fieldset>
			<p>&nbsp;</p>
			<h3>Photos of your project:</h3>
			<div class="photo-wrapper">
				@if (isset($project))
					<?php
					$files = array();
					if ($project->files != "") $files = explode(',', $project->files);
					?>
					@foreach ($files as $file)
					<div class="pull-left image-container">
						<div class="fileupload">
							<div class="fileulpoad-new thumbnail">
								<img src="{{$file}}" />
								<br />
							</div>
							<input type="hidden" name="existing_file[]" value="{{$file}}" />
							<button type="button" onclick="remove_image(this);" class="btn btn-danger title="Remove photo""><i class="fa fa-trash-o"></i></button>
						</div>
					</div>
					@endforeach
				@endif
				

				@if (!isset($project))
				<div class="pull-left image-container">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail"><i class="fa fa-picture-o"></i></div>
						<div class="fileupload-preview fileupload-exists thumbnail"></div>
						<br />
						<span class="btn btn-file"><span class="fileupload-new"><i class="fa fa-upload"></i></span><span class="fileupload-exists">Change</span><input type="file" name="file[]" /></span>
						<button type="button" onclick="remove_image(this);" class="btn btn-danger" title="Remove photo"><i class="fa fa-trash-o"></i></button>

					</div>
				</div>
				@endif
				<div  title="Add more photo" class="pull-left" id="add-image-btn">
					<div class="thumbnail" onclick="add_image();">
						<i class="fa fa-plus"></i>
					</div>		
				</div>

				<div class="clearfix"></div>
				<p>&nbsp;</p>
			</div>
			<h3>How did you do it?</h3>
			<fieldset>
			
				<textarea id="redactor_content" placeholder="Hey! This is my nice project: " name="content" type="text" style="display: none; overflow: scroll; ">
				
				</textarea>			
			</fieldset>			
			<p>&nbsp;</p>
			<h3>Upload project files:</h3>
			<p class="help-block">Optional</p>
			<div class="photo-wrapper">
				@if (isset($project))
					<?php
					$docs = array();
					if ($project->docs != "") $docs = explode(',', $project->docs);
					?>
					@foreach ($docs as $doc)
					<div class="pull-left image-container">
						<div class="fileupload">
							<div class="fileupload-new thumbnail">
								<img src="{{$doc}}" />
								<br />
							</div>
							<input type="hidden" name="existing_file[]" value="{{$doc}}" />
							<button type="button" onclick="remove_image(this);" class="btn btn-danger title="Remove photo""><i class="fa fa-trash-o"></i></button>
						</div>
					</div>
					@endforeach
				@endif
				

				@if (!isset($project))
				<div class="pull-left image-container">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail"><i class="fa fa-file-text-o"></i></div>
						<div class="fileupload-preview fileupload-exists thumbnail"></div>
						<br />
						<span class="btn btn-file"><span class="fileupload-new"><i class="fa fa-upload"></i></span><span class="fileupload-exists">Change</span><input type="file" name="doc[]" /></span>
						<button type="button" onclick="remove_image(this);" class="btn btn-danger" title="Remove photo"><i class="fa fa-trash-o"></i></button>

					</div>
				</div>
				@endif
				<div  title="Add more photo" class="pull-left" id="add-file-btn">
					<div class="thumbnail" onclick="add_file();">
						<i class="fa fa-plus"></i>
					</div>		
				</div>

				<div class="clearfix"></div>
				<p>&nbsp;</p>
			</div>

			<p>&nbsp;</p>
		
			<div class="project_type">
              <ul>                
                <li class="project_selection" > 
                  <div class="project_category"> 
                  <p><strong>Category</strong> </p>
                  <form role="form">
			        <label class="checkbox-inline">
			          <input type="checkbox" id="inlineCheckbox1" value="option1"> DIY
			        </label>
			        <label class="checkbox-inline">
			          <input type="checkbox" id="inlineCheckbox2" value="option2"> 3D Printing
			        </label>
			        <label class="checkbox-inline">
			          <input type="checkbox" id="inlineCheckbox3" value="option3"> Laser Cutting
			        </label>
			      </form>
                  </div>
                  <div class="project_license"> 
                    <p>License (<a style="color: #34a26a;" href="http://creativecommons.org/licenses/">Learn about different licenses</a>)</p>
                    <p class="help-block" style="font-size: 12px">Choose how you want your project to be used by others</p>
                    <select class="form-control">
                      <option>Standard Creative Commons</option>
                      <option>Sharealike</option>
                      <option>No commercials</option>
                     
                    </select>
                 </div>
                </li>             
                <li class="project_tag">
                  <div>            
                    <p><strong>Tags</strong></p>
                    <p class="help-block">Separate tags by ","</p>
                    <form role="form">
                        <textarea class="form-control" rows="3"></textarea>
                    </form>
                  </div>  
                </li>            
              </ul>
            </div> 
            <p>&nbsp;</p>          
		
			@if (Sentry::Check() && Sentry::getUser()->hasAccess('is_admin'))
			{{(isset($project)) ? '<button type="button" class="btn btn-danger" onclick="delete_project();">Delete project</button>' : '' }}
			@endif

		</div>
		<hr>

		<div class="row">
		<div class="col-md-7">

		<p> <strong>Guidelines:</strong></br>
TransPortal is a place for you to share creative FabLab designs.</br>
1. Designs must represent a real, physical object that can be made.</br>
2. Please only upload designs you've created or participated closely in creating.</br>
3. You may upload open-source/copyleft designs if you provide attribution.</br>
4. No pornographic or sexually explicit designs.</br>
5. Please don't upload weapons. The world has plenty of weapons already. </br> (reference: Thingiverse. March,2014)</p>
</div>
<div class="col-md-5"><strong>Supported Filetypes:</strong> </br>
We allow uploading of almost any filetype. If you can digitally represent a physical object, then please upload your files to Thingiverse. 

stl, dxf, svg, ai, cdr, jpg, gif, png, pdf, tiff, eps, ps, sch, brd, pov
</div> </div>
	 	<div> 	

		 	<input type="submit" value="Save project" class="btn btn-success" style="background-color: #34a26a;">
		 	<input  data-toggle="modal" data-target=".cancel-project" type="button" value="Cancel" class="btn btn-warning" >
	 		
			<!-- Small modal -->
			<div class="modal fade cancel-project" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      	<div class="modal-header">
			          	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			          	<h4 class="modal-title" id="mySmallModalLabel">Are you sure you want to cancel?</h4>
			      	</div>
			      	<div class="modal-body">
			      		<p>All progress will be lost.</p>
			      	</div>

			      	<div class="modal-footer">
				        <button type="button" class="btn btn-success" data-dismiss="modal">Keep editing</button>
				        <button action="action" type="button" onclick="javascript:window.location.href='/home'"  class="btn btn-warning">Cancel project</button>
				    </div>
			    </div>
			  </div>
			</div>
	 	</div>
	</div>



	{{Form::close()}}



@stop
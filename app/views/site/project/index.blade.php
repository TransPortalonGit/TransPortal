@extends('layouts.master')

@section('head')
<script type="text/javascript">
$(document).ready(function() {
	
	$('.cover-item').click(function(e){
		e.preventDefault();
		window.location = $(this).find('a:first').attr('href');
	});
	
});
</script>
@stop

@section('content')
	<div class="row">
		<div class="span12" id="project">
			<div class="shield">
				<h1>Projects</h1>
				@if (Sentry::Check())
				<a href="/projects/create" class="btn btn-admin"><i class="icon-plus"></i></a>
				@endif
			</div>

			<h3 style="color: #d00;">Want to show what you have done? <small>Simply <a href="/account/register/">register</a> for an account.</small></h3>

			@foreach($projects as $project)
			<div class="cover-item">
				<div class="cover-item-content">
					<h2><a href="/projects/show/{{$project->id}}">{{$project->title}}</a></h2>
					<p>{{$project->description}}</p>
				</div>
				<div class="cover-item-author">By {{$project->user->fullname()}} <span class="muted">– {{date("d.m.Y", strtotime($project->created_at));}}</span></div>
				
			</div>
			@endforeach

			{{$projects->links();}}
				
		</div>
	</div>

@stop
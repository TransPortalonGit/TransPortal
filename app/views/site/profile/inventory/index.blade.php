@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xs-12"> 
		<div class="content_container container">

			@include('site.profile._user_profileheader')			

			@include('site.profile._user_navigation')

			@include('site.profile.inventory._user_inventory')


		</div>
	</div>
</div>
@stop
@extends('layouts.app')

@section('content')
	<div class="row">
  		<div class="col-md-2"></div>
  		<div class="col-md-8">
  			@include('partials.page-header')

		  	@if (!have_posts())
			    <div class="alert alert-warning">
			      {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
			    </div>
		    	{!! get_search_form(false) !!}
		 	@endif
		 </div>
		 <div class="col-md-2"></div>
    </div>
@endsection

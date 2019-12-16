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
			    <div class="help">
			    	<h4>{{ __('A few things to try:', 'sage') }}</h4>
			    	<ul>
			    		<li>{{ __('Check your spelling', 'sage') }}</li>
			    		<li>{{ __('Use the search form below to look for the page you tried to reach', 'sage') }}</li>
				 		<li>{{ __('If you’re still unable to find what you’re looking for, contact us and we can try to help!', 'sage') }}</li>
				 	</ul>
				</div>
		    	{!! get_search_form() !!}
		 	@endif
		 </div>
		 <div class="col-md-2"></div>
    </div>
@endsection

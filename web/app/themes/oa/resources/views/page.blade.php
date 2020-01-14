@extends('layouts.app')



@section('tabs')
  <div class="container oa-tabs">
    <div class="row">
      <div class="col-12">
        @include('partials.content-tabs-navigation')
      </div>
    </div>
  </div>

@endsection
@section('content')
  @while(have_posts()) @php the_post() @endphp
  	<div class="row">
  		<div class="col-md-2"></div>
  		<div class="col-md-8">
	    	@include('partials.page-header')
        @include('partials/content-subheader')
	    	@include('partials.content-page')
	    </div>
	    <div class="col-md-2"></div>
    </div>
  @endwhile
@endsection

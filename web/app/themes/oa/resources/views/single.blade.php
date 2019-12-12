@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  	<div class="row">
  		<div class="col-md-2"></div>
  		<div class="col-md-8">
    		@include('partials.content-single-'.get_post_type())
    	</div>
    	<div class="col-md-2"></div>
    </div>
  @endwhile
@endsection

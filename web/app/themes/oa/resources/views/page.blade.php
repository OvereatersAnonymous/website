@extends('layouts.app')

@section('tabs')
	@include('partials.content-tabs-navigation')
@endsection
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @include('partials.content-tabs-navigation')
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection

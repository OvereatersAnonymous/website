{{--
  Template Name: Find a Meeting Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.page-find-a-meeting-tabs')
    @include('partials.content-page')
    @include('partials.page-find-a-meetings-callouts')
  @endwhile
@endsection

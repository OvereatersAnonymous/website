{{--
  Template Name: Homepage Template
--}}

@extends('layouts.home')

@section('hero')
  @while(have_posts()) @php(the_post())
    @include('partials.content-hero')
  @endwhile
@endsection
@section('signups')
    @include('partials.homepage-signups')
@endsection
@section('podcasts')
    @include('partials.homepage-podcasts')
@endsection
@section('news')
    @include('partials.homepage-news')
@endsection
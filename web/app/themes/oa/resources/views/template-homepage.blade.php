{{--
  Template Name: Homepage Template
--}}

@extends('layouts.home')

@section('hero')
  @while(have_posts()) @php(the_post())
    @include('partials.content-hero')
  @endwhile
@endsection
@section('signup')
    @include('partials.homepage-signup')
@endsection

@section('podcasts')
    @include('partials.homepage-podcasts')
@endsection

@section('news')
    @include('partials.homepage-news')
@endsection
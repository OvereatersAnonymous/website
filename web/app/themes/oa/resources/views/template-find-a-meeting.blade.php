{{--
  Template Name: Find a Meeting Template
--}}

@extends('layouts.find-a-meeting')
@section('page-title')
  <div class="container">
    @include('partials.page-header')
  </div>
@endsection
@section('tabs')
  <div class="container oa-tabs">
    <div class="row">
      <div class="col-12">
         @include('partials.page-find-a-meeting-tabs')
      </div>
    </div>
  </div>
@endsection
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
    @include('partials.page-find-a-meetings-callouts')
  @endwhile
@endsection

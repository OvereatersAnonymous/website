{{--
  Template Name: Quizzes Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  <div class="quizzes--quiz">
    <div class="quizzes--quiz--questions slide slide--1">
      <div class="quizzes--quiz--question">your content</div>
      <button class="btn btn--quiz--slick" value="1" type="button">Yes</button>
      <button class="btn btn--quiz--slick" value="0" type="button">No</button>
    </div>
    <div class="quizzes--quiz--questions slide slide--2">
      <div class="quizzes--quiz--question">your content2</div>
      <button class="btn btn--quiz--slick" value="1" type="button">Yes</button>
      <button class="btn btn--quiz--slick" value="0" type="button">No</button>
    </div>
    <div class="quizzes--quiz--questions slide slide--3">
      <div class="quizzes--quiz--question">your content3</div>
      <button class="btn btn--quiz--slick" value="1" type="button">Yes</button>
      <button class="btn btn--quiz--slick" value="0" type="button">No</button>
    </div>
  </div>
  <div class="results" style="display:none">
    <h2>Your results are</h2>

  </div>
  @endwhile
@endsection

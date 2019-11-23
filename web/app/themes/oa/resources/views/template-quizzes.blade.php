{{--
  Template Name: Quizzes Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
    @if(!empty($quizzes[0]))
      <div class="quizzes--quiz">
        @include('partials.content-quiz',['item_id'=>$quizzes[0]->ID])
      </div>
    @endif
    <div class="results" style="display:none">
      <h2>Your results are</h2>
    </div>
  @endwhile
@endsection

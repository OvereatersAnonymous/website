{{--
  Template Name: Quizzes Template
--}}

@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.page-header')
        @include('partials.content-page')
        @if(!empty($quiz[0]))
          <div class="quizzes--quiz" data-pid="{!! $quiz[0]->ID !!}">
            @include('partials.content-quiz',['item_id'=>$quiz[0]->ID])
          </div>
        @endif
        <div class="results" style="display:none">
        </div>
      @endwhile
    </div>
    <div class="col-md-2"></div>
  </div>
@endsection

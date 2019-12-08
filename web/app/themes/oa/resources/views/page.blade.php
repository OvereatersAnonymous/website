@extends('layouts.app')



@section('tabs')
  <div class="container oa-tabs">
    <div class="row">
      <div class="col-12">
        @include('partials.content-tabs-navigation')
      </div>
    </div>
  </div>
 
@endsection
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection

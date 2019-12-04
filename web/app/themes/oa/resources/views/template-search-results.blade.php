{{--
  Template Name: Search Results
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
    <script>
      (function() {
          var cx = '{!! get_field('google_search_engine_id','option') !!}';
          var gcse = document.createElement('script');
          gcse.type = 'text/javascript';
          gcse.async = true;
          gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(gcse, s);
      })();
    </script>
    <gcse:searchresults-only></gcse:searchresults-only>
  @endwhile
@endsection

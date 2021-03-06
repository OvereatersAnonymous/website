{{--
  Template Name: Search Results
--}}

@extends('layouts.app')

@section('content')
 <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
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
      <a class="cookiebot-consent-link" href="javascript: Cookiebot.renew()">{{ get_field('cookiebot_cookie_consent_warning_link_text','option') }}</a>
      @endwhile
    </div>
  </div>
@endsection

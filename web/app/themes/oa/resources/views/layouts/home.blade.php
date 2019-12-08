<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    <!--<div class="animsition">-->
      <div class="content-wrap" role="document">
        @php(do_action('get_header'))
        @include('partials.header')
        <div class="main" role="main">   
          @yield('hero')
          @yield('signups')
          @yield('podcasts')
          @yield('news')
        </div>
      </div>
      @php(do_action('get_footer'))
      @include('partials.footer')
    <!--</div>-->
    @php(wp_footer())
  </body>
</html>
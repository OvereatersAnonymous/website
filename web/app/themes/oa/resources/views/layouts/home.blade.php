<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    <div class="animsition">
      @php(do_action('get_header'))
      @include('partials.header')
      <div class="wrap video container-fluid" role="document">
        @yield('hero')
      </div>
      @php(do_action('get_footer'))
      @include('partials.footer')
      @php(wp_footer())
    </div>
  </body>
</html>

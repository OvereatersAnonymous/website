<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
     <div class="content-wrap" role="document">
      @php(do_action('get_header'))
      @include('partials.header')
      <div class="main">   
        <div class="container-fluid" role="document">
          @yield('hero')
        </div>
      </div>
    </div>
     <div class="container">
         <div class="content">
             @yield('signup')
         </div>
     </div>
     <div class="container">
         <div class="content">
             @yield('podcast')
         </div>
     </div>
     <div class="container">
         <div class="content">
             @yield('news')
         </div>
     </div>
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())

  </body>
</html>

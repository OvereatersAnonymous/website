<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    <div class="animsition">
      <div class="content-wrap">
        @php do_action('get_header') @endphp
        @include('partials.header')
        @yield('page-title')
        @yield('tabs')
        <div class="jumbotron-fluid main-wrapper">
          <div class="container" role="document">
            <div class="content">
              <main class="main" @if(App::featuredImage()) style="background-image: url('{{App::featuredImageSrc()}}');" @endif>
                @yield('content')
              </main>
              @if (App\display_sidebar())
                <aside class="sidebar">
                  @include('partials.sidebar')
                </aside>
              @endif
            </div>
          </div>
        </div>
      </div>
      @php do_action('get_footer') @endphp
      @include('partials.footer')
      @php wp_footer() @endphp
    </div>
    @include('partials.trackers')
  </body>
</html>

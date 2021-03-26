<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp @php if(App::authCheck()) { echo "onunload=\"\""; } @endphp>
    <div class="">
      <div class="content-wrap">
        @php do_action('get_header') @endphp
        @include('partials.header')
        @yield('tabs')
        <div class="jumbotron-fluid main-wrapper {!! App::get_field('background_color') !!}">
          <div class="container" role="document">
            <div class="content">
              <main class="main">
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
  </body>
</html>

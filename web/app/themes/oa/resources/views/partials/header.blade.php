<div class="container-fluid search-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="search">
        @include('partials.widget-search')
      </div>
    </div>
  </div>
</div>
<header class="banner">
  <div class="container-fluid hat">
    <div class="row">
      <div class="col-md-12">
        <div class="container" style="position: relative;">
        	<!-- hat nav-->
        	<div class="row">
        		<div class="col-md-4">
        			@include('partials.widget-country-select')
        		</div>
        		<div class="col-md-3">
        			@include('partials.widget-language-select')
        		</div>
        		<div class="col-md-5">
        			@if (has_nav_menu('header_navigation'))
              	{!! wp_nav_menu(['theme_location' => 'header_navigation']) !!}
              @endif
            </div>
          </div>
        	<!-- //END hat -->
        </div>
      </div>
    </div>
  </div>
  <div class="container brand-nav">
  	<!-- Brand and main nav row -->
    <div class="row">
    	<div class="col-5">
    			@if (get_custom_logo())
    				{!!  get_custom_logo() !!}
    			@else
    				{{ get_bloginfo('name', 'display') }}
    			@endif
    	</div>
    	<div class="col-7">
		    <nav class="nav-primary">
          @include('partials.widget-feature-btn')
          <div class="overlay-toggle"><a href="#" tabindex="1" class="primary-nav-toggle" id="primary-nav-toggle"><span class="sr-only"> @php _e("Menu","sage"); @endphp</span></a></div>
		    </nav>
		</div>
	</div>
    <!-- //END -->
  </div>
</header>
<div class="overlay-nav container-fluid no-gutters" style="">
  <div class="container">
    <div class="overlay-toggle">
      <a href="#" id="primary-nav-close"><span class="sr-only"> @php _e("Close Menu","sage"); @endphp</span></a>
    </div>
    <div class="row">
      <div class="wrapper">
        <nav class="nav-primary">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation']) !!}
          @endif
        </nav>
        @if (has_nav_menu('header_navigation'))
          {!! wp_nav_menu(['theme_location' => 'header_navigation', 'menu_class' => 'supporting-nav']) !!}
        @endif
        @include('partials.widget-feature-btn')
      </div>
    </div>
  </div>
</div>

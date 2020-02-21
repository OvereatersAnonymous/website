<div class="container-fluid search-wrapper hidden-print">
  <div class="row">
    <div class="col-md-12">
      <div class="search">
        @include('partials.widget-search')
      </div>
    </div>
  </div>
</div>
<header class="banner">
  <div class="jambotron hat hidden-print">
    <div class="container" style="position: relative;">
    	<!-- hat nav-->
    	<div class="row">
    		<div class="col-md-3">
    			@include('partials.widget-country-select')
    		</div>
    		<div class="col-md-3 goog-lang">
    			@include('partials.widget-language-select')
    		</div>
    		<div class="col-md-6 header-navigation-wrapper">
    			@if (has_nav_menu('header_navigation'))
          	{!! wp_nav_menu(['theme_location' => 'header_navigation']) !!}
          @endif
          <div class="search-toggle"><a href="#" class="search-toggle--btn" id="search-toggle--btn"><span> @php _e("Search","sage"); @endphp</span></a></div>
        </div>
      </div>
    	<!-- //END hat -->
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
    	<div class="col-7 hidden-print">
		    <nav class="nav-primary">
          @include('partials.widget-feature-btn')
          <div class="overlay-toggle"><a href="#menu" tabindex="1" class="primary-nav-toggle" id="primary-nav-toggle"><span class="sr-only"> @php _e("Menu","sage"); @endphp</span></a></div>
		    </nav>
		</div>
	</div>
    <!-- //END -->
  </div>
</header>
<div class="overlay-nav" style="">
  <div class="container" style="padding-bottom: 50px;">
    <div class="row">
      <div class="col-md-12">
        <div class="overlay-toggle">
          <a href="#" id="primary-nav-close"><span class="sr-only"> @php _e("Close Menu","sage"); @endphp</span></a>
        </div>
        <div class="row">
          <div class="wrapper">
            @include('partials.widget-feature-btn')
            @include('partials.widget-search')
            <nav class="nav-primary">
              @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation']) !!}
              @endif
            </nav>
            @if (has_nav_menu('header_navigation'))
              {!! wp_nav_menu(['theme_location' => 'header_navigation', 'menu_class' => 'supporting-nav']) !!}
            @endif
            
            <div class="country-select-mobile">
              <h4>{{__('Available in 20+ countries','sage')}}</h4>
              @include('partials.widget-country-select')
            </div>
            <div class="language-select-mobile">
              <!-- language select moves here in mobile view -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

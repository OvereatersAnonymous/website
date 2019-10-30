<header class="banner">
  <div class="container">
  	<!-- hat nav-->
  	<div class="row hat">
  		<div class="col-md-4">
  			country select
  		</div>
  		<div class="col-md-4">
  			Language select
  		</div>
  		<div class="col-md-4">
  			@if (has_nav_menu('header_navigation'))
        		{!! wp_nav_menu(['theme_location' => 'header_navigation']) !!}
        	@endif
        </div>
    </div>
  	<!-- //END hat -->
  	<!-- Brand and main nav row -->
    <div class="row brand-nav">
    	<div class="col-md-6">
    		<a class="brand" href="{{ home_url('/') }}">
    			@if (get_custom_logo())
    				{!!  get_custom_logo() !!}
    			@else
    				{{ get_bloginfo('name', 'display') }}
    			@endif
    		</a>
    		
    	</div>
    	<div class="col-md-6">
		    <nav class="nav-primary">
		    	<a href="#" class="btn primary">Find a meeting</a> 
		      @if (has_nav_menu('primary_navigation'))
		        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
		      @endif
		    </nav>
		</div>
	</div>
    <!-- //END -->
  </div>
</header>

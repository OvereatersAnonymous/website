<div class="jumbotron-fluid signups">
	<div class="container">
    	<div class="row signup">
	        <div class="col-md-5 signups--form">
	        	<div class="callout">
		        	<h2>{!! App::get_field('signup_title') !!}</h2>
		        	<div class="copy">
		        		<p>{!! App::get_field('signup_teaser') !!}</p>
		        	</div>
		        	<div class="form-markup">
		        		{!! App::get_field('signup_html') !!}
		        	</div>
		        </div>
	        </div>
	        <div class="col-md-1"></div>
	        <div class="col-md-5 signups--callout">
	        	@if ($custom_callout) 
	            	@include('partials.content-callout',['callout'=>$custom_callout])
	            @endif
	        </div>
	    </div>
    </div>
</div>
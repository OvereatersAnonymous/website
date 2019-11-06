<div class="container-fluid signups">
	<div class="container">
    	<div class="row signup">
	        <div class="col-md-6 signups--form">
	        	@if ($signup_callout) 
	            	@include('partials.content-callout',['callout'=>$signup_callout])
	            @endif
	        </div>
	        <div class="col-md-6 signups--callout">
	        	@if ($custom_callout) 
	            	@include('partials.content-callout',['callout'=>$custom_callout])
	            @endif
	        </div>
	    </div>
    </div>
</div>
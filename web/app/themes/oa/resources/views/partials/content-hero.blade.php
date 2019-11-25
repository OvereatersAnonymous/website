<div class="jumbotron-fluid" role="banner">
	<div class="container">
		<div class="row">
			<div class="col-12 hero">
				@if($homepage_slider)
					<div class="hero-slider" id="slideContainer">
						@foreach ($homepage_slider as $slide)
							@include('partials.content-hero-slide',['slide'=>$slide])
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
<div class="hero">
    @if($homepage_slider)
    <div class="row">
        <div class="hero-slider" id="slideContainer">
            @foreach ($homepage_slider as $slide)
                @include('partials.content-hero-slide',['slide'=>$slide])
            @endforeach
        </div>
    </div>
    @endif
</div>
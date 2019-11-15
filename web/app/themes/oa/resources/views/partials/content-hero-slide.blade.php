<div class="hero" data-src="{!! $slide['hero_image']['sizes']['large@1x'] !!}">
    <span class="sr-only">{!! $slide['hero_image']['alt'] !!}</span>
    <div class="callout">
        <div class="title">{!! $slide['hero_home_callout_title'] !!}</div>
        <div class="copy">{!! $slide['hero_home_callout_copy'] !!}</div>
        @if($slide['hero_home_button_url'])
        <div class="button-container">
            <a class="button" href="{!! $slide['hero_home_button_url']!!}">{!! $slide['hero_home_callout_button_button_text'] !!}</a>
        </div>
        @endif
    </div>
</div>
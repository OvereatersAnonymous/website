<div class="hero" data-src="{!! $slide['hero_image']['sizes']['large@1x'] !!}">
    <span class="sr-only">{!! $slide['hero_image']['alt'] !!}</span>
    <div class="callout">
        <div class="title">{!! $slide['hero_home_callout_title'] !!}</div>
        <div class="copy">{!! $slide['hero_home_callout_copy'] !!}</div>
        @if($slide['hero_home_button_url'] || $slide['hero_home_internal_button_link'])
            <div class="button-container">
                <a class="btn {!! $slide['hero_home_button_style']!!}" href="@if($slide['hero_home_button_link_type'] == '1') {!! $slide['hero_home_button_url']!!} @else {!! $slide['hero_home_internal_button_link']!!} @endif">{!! $slide['hero_home_button_text'] !!}</a>
            </div>
        @endif
    </div>
</div>
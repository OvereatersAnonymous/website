<div class="callout">
    <div class="title">{!! $callout['callout_title'] !!}</div>
    <div class="copy">{!! $callout['callout_copy'] !!}</div>
    @if($callout['button_url'])
        <div class="button-container">
            <a class="button" href="{!! $callout['button_url']!!}">{!! $callout['button_text'] !!}</a>
        </div>
    @endif
</div>
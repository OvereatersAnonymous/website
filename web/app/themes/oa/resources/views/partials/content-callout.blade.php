<div class="callout">
    <h2>{!! $callout['callout_title'] !!}</h2>
    <div class="copy">{!! $callout['callout_copy'] !!}</div>
    @if($callout['button_url'] || $callout['internal_button_link'])
        <div class="button-container">
            <a class="btn {!! $callout['button_style']!!}" href="@if($callout['button_link_type'] == '1') {!! $callout['button_url']!!} @else {!! $callout['internal_button_link']!!} @endif">{!! $callout['button_text'] !!}</a>
        </div>
    @endif
</div>
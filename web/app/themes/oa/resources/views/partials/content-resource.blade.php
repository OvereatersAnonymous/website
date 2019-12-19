<div class="resource row">
    @if(!empty($resource['icon']))
        <div class="resource--icon col-sm-3">
            <i class="{!! $resource['icon'] !!}"></i>
        </div>
    @endif
    <div class="col-sm-9">
        @if(!empty($resource['link']))
            <div class="resource--link">
                <a href="{!! $resource['link']['url'] !!}" target="{!! $resource['link']['target'] !!}">{!! $resource['link']['title'] !!}</a>
            </div>
        @endif
        @if(!empty($resource['type']))
            <div class="resource--type">
                {!! $resource['type'] !!}
            </div>
        @endif
    </div>
</div>
<div class="resource">
    @if(!empty($resource['icon']))
        <i class="{!! $resource['icon'] !!}"></i>
    @endif
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
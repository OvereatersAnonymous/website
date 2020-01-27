@if($podcast_callout)
    <div class="jumbotron-fluid podcasts">
        <div class="container">
            <div class="row podcasts--podcast">
                <div class="col-md-3 unveil-bg" data-src="{!! $podcast_callout['podcast_home_image']['sizes']['medium'] !!}|{!! $podcast_callout['podcast_home_image']['sizes']['medium@2x'] !!}">
                    <span class="sr-only">{!! $podcast_callout['podcast_home_image']['alt'] !!}</span>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8 podcasts--callout">
                    @include('partials.content-callout',['callout'=>$podcast_callout])
                </div>
            </div>
        </div>
    </div>
@endif
@if($podcast_callout)
    <div class="jumbotron-fluid podcasts">
        <div class="container">
            <div class="row podcast">
                <div class="col-12">
                    <!--@if($podcast_callout['podcast_home_image'])
                    <div class="podcast--image">
                        <img src="{!! $podcast_callout['podcast_home_image']['sizes']['medium@1x'] !!}" alt="{!! $podcast_callout['podcast_home_image']['alt'] !!}" title="{!! $podcast_callout['podcast_home_image']['alt'] !!}" />
                    </div>
                    @endif-->
                    <div class="podcast--callout">
                        @include('partials.content-callout',['callout'=>$podcast_callout])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
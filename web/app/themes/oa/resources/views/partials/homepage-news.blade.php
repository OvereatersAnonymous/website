@if ($news_callout)
    <div class="jumbotron-fluid news">
        <div class="container">
            <div class="row newsrow">
                <div class="col-md-6 newsrow--callout">
                   @include('partials.content-callout',['callout'=>$news_callout])
                </div>
                <div class="col-md-6 newsrow--latest">
                   <h3>{!! __('Recently Posted', 'sage')  !!}</h3>
                    <a href="{!! get_the_permalink($latest_news->ID); !!}">
                        {!! App::truncateString(get_the_title($latest_news->ID), 20) !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="news">
    <div class="row">
        <div class="news__callout">
            @include('partials.content-callout',['callout'=>$news_callout])
        </div>
        <div class="news__latest">
            <h3>{!! __('Recently Posted', 'sage')  !!}</h3>
            <div class="news__latest__link">
                <a href="{!! get_the_permalink($latest_news->ID); !!}">
                    {!! App::truncateString(get_the_title($latest_news->ID), 20) !!}
                </a>
            </div>
        </div>
    </div>
</div>

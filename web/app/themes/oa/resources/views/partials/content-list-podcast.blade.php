{{-- You must pass the post ID to this template as $item_id --}}
<div class="content-wrapper item-{!! $loop->iteration !!}">
  <div class="content-item">
    <div class="content-item--title">
    <a href="{!! get_the_permalink($item_id); !!}?podcast-category={!! APP::get_uri_param('podcast-category') !!}&page={!! get_query_var('paged') !!}&podcast-order={!! APP::get_uri_param('podcast-order') !!}" class="content-item__link">
      {!! App::truncateString(get_the_title($item_id), 20) !!}
    </a>
  </div>
    <div class="content-item--date">
      {!! get_the_date('M d, Y',$item_id) !!}
    </div>
    <div class="content-item--podcast_links">
      @if(get_field("podcast_google_link", $item_id))
        <a href="{!! get_field('podcast_google_link', $item_id); !!}" class="google" target="_blank">
          <img src="@asset('images/en_badge_google.png')" alt="{!! _e('Get it on Google play','sage'); !!}">
        </a>
      @endif
      @if(get_field("podcast_itunes_link", $item_id))
        <a href="{!! get_field('podcast_itunes_link', $item_id); !!}" class="itunes" target="_blank">
          <img src="@asset('images/en_badge_itunes.png')" alt="{!! _e('Listen on Apple Podcasts','sage'); !!}">
        </a>
      @endif
    </div>
</div>

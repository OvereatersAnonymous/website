{{-- You must pass the post ID to this template as $item_id --}}
<div class="content-wrapper item-{!! $loop->iteration !!}">
  <div class="content-item">
    <div class="content-item__title">
    <a href="{!! get_the_permalink($item_id); !!}" class="content-item__link">
      {!! App::truncateString(get_the_title($item_id), 20) !!}
    </a>
  </div>
    <div class="content-item__date">
      {!! get_the_date('M d, Y',$item_id) !!}
    </div>
    <div class="content-item__podcast_links">
      <a href="{!! get_field("podcast_google_link", $item_id); !!}" alt="" class="content-item__podcast_link__google">
        <span>Google</span>
      </a>
      <a href="{!! get_field("podcast_itunes_link", $item_id); !!}" alt="" class="content-item__podcast_link__itunes">
        <span>Itunes</span>
      </a>
    </div>
</div>
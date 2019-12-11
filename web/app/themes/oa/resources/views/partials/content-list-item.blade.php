{{-- You must pass the post ID to this template as $item_id --}}
<div class="content-wrapper item-{!! $loop->iteration !!}">
  <div class="content-item">    
    <div class="content-item--image">
      <a href="{!! get_the_permalink($item_id); !!}?news-category={!! APP::get_uri_param('news-category') !!}&page={!! get_query_var('paged') !!}" class="content-item--link">
        @if(has_post_thumbnail($item_id))
          <img src="{{App::featuredImageSrc('medium@2x',$item_id)}}" data-src="{{App::featuredImageSrc('medium',$item_id)}}|{{App::featuredImageSrc('medium@2x',$item_id)}}" alt="{{ App::featuredImageAlt($item_id) }}"/>
        @else
          <img src="@asset('images/placeholder.png')" alt="{!! __('News placeholder image','sage') !!}" />
        @endif
      </a>
    </div>
    <div class="content-item--title">
      <a href="{!! get_the_permalink($item_id); !!}?news-category={!! APP::get_uri_param('news-category') !!}&page={!! get_query_var('paged') !!}" class="content-item--link">
        {!! App::truncateString(get_the_title($item_id), 20) !!}
      </a>
    </div>
  </div>
</div>
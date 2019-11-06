{{-- You must pass the post ID to this template as $item_id --}}
<div class="content-wrapper item-{!! $loop->iteration !!}">
  <div class="content-item">
    @if(App::featuredImageSrc('square@2x',$item_id))
    <div class="content-item__image">
      <a href="{!! get_the_permalink($item_id); !!}" class="content-item__link">
        <img src="{{App::featuredImageSrc('square@2x',$item_id)}}" alt="{{ App::featuredImageAlt($item_id) }}"/>
      </a>
    </div>
    @endif
    <div class="content-item__title">
    <a href="{!! get_the_permalink($item_id); !!}" class="content-item__link">
      {!! App::truncateString(get_the_title($item_id), 20) !!}
    </a>
  </div>
</div>
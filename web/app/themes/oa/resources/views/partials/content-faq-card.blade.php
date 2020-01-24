{{-- You must pass the post ID to this template as $item_id --}}
<div class="faq">
  <div class="faq--heading" id="heading-{!! $item_id !!}">
    <h4 class="@if($loop->iteration > 1)collapsed @endif" data-toggle="collapse" data-target="#collapse-{!! $item_id !!}" aria-expanded="true" aria-controls="collapse-{!! $item_id !!}">
       {!! get_the_title($item_id) !!} <i class="fa fa-chevron-down" style="font-size: 14px;"></i>
     </h4>
  </div>

  <div id="collapse-{!! $item_id !!}" class="collapse @if($loop->iteration == 1)show @endif" aria-labelledby="heading-{!! $item_id !!}">
    <div class="faq--body">
      @php echo apply_filters( 'the_content', get_the_content(null,false,$item_id) ); @endphp
    </div>
  </div>
</div>
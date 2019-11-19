{{-- You must pass the post ID to this template as $item_id --}}
<div class="card">
  <div class="card-header" id="heading-{!! $item_id !!}">
    <h2 class="mb-0">
      <button class="btn btn-link @if($loop->iteration > 1)collapsed @endif" type="button" data-toggle="collapse" data-target="#collapse-{!! $item_id !!}" aria-expanded="true" aria-controls="collapse-{!! $item_id !!}">
       {!! get_the_title($item_id) !!}
      </button>
    </h2>
  </div>

  <div id="collapse-{!! $item_id !!}" class="collapse @if($loop->iteration == 1)show @endif" aria-labelledby="heading-{!! $item_id !!}">
    <div class="card-body">
      @php echo apply_filters( 'the_content', get_the_content(null,false,$item_id) ); @endphp
    </div>
  </div>
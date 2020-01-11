@if(!empty(App::get_field('button_link_url')))
<div class="button-link">
  <div class="button-container">
    <a class="btn" href="{!! App::get_field('button_link_url') !!}" target="@if(!empty(App::get_field('button_link_target'))){!! App::get_field('button_link_target') !!}@else _parent @endif"> @if(!empty(App::get_field('button_link_icon')))<i class="{!! App::get_field('button_link_icon') !!}"></i>@endif @if(!empty(App::get_field('button_link_text'))){!! App::get_field('button_link_text') !!}@endif</a>
  </div>
</div>
@endif

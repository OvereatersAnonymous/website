<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if(empty($active_tab)) active @endif" href="{!! $base_tab_url !!}">{!! __('All','sage') !!}</a>
    </li>
    @foreach($terms as $term)
    <li class="nav-item">
        <a class="nav-link @if($active_tab==$term->term_id) active @endif " href="{!! $base_tab_url !!}?podcast-category={!! $term->term_id !!}">{!! $term->name !!}</a>
    </li>
    @endforeach
</ul>
<ul class="nav nav-tabs desktop">
    <li class="nav-item">
        <a class="nav-link @if(empty($active_tab)) active @endif" href="{!! $base_tab_url !!}">{!! __('All','sage') !!}</a>
    </li>
    @foreach($terms as $term)
        <li class="nav-item">
            <a class="nav-link @if($active_tab==$term->term_id) active @endif" href="{!! $base_tab_url !!}?{!! $tab_query_string_param !!}={!! $term->term_id !!}">{!! $term->name !!}</a>
        </li>
    @endforeach
</ul>
<div class="nav nav-select mobile">
	<select id="nav-select" class="select-field">
		<option @if(empty($active_tab)) selected @endif value="{!! $base_tab_url !!}">{{ __('All','sage') }}</option>
		@foreach($terms as $term)
			<option @if($active_tab==$term->term_id) selected @endif value="{!! $base_tab_url !!}?{!! $tab_query_string_param !!}={!! $term->term_id !!}">{{ $term->name }}</option>
		@endforeach
	</select>
</div>
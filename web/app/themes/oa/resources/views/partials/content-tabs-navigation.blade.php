@if ($menus_nav)
    <ul class="nav nav-tabs desktop">
        <li class="nav-item">
            <a class="nav-link @if($menus_nav['active']==$menus_nav['top_parent'])active @endif" href="{{ get_the_permalink($menus_nav['top_parent']) }}">{!! App::postTitle($menus_nav['top_parent']) !!}</a>
        </li>
        @foreach($menus_nav['pages'] as $page_id => $child_pages)
            <li class="nav-item @if($child_pages) dropdown @endif">
                <a class="nav-link @if($menus_nav['active']==$page_id)active @endif @if($child_pages) dropdown-toggle @endif" @if($child_pages)data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" @endif href="{{ get_the_permalink($page_id) }}">{!! App::postTitle($page_id) !!}</a>
                {{--This Menu will support one level child for pages under the child tab. Support for more will require recursive partial template  --}}
                @if($child_pages)
                    <div class="dropdown-menu">
                        @foreach($child_pages as $child_page_id => $pages)
                            <a class="dropdown-item" href="{{ get_the_permalink($child_page_id) }}">{!!  App::postTitle($child_page_id) !!}</a>
                        @endforeach
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
    <div class="nav nav-select mobile">
        <select id="nav-select" class="select-field">
           <option @if($menus_nav['active']==$menus_nav['top_parent'])selected @endif>{{ App::postTitle($menus_nav['top_parent']) }}</option>
            @foreach($menus_nav['pages'] as $page_id => $child_pages)
                <option @if($menus_nav['active']==$page_id)selected @endif value="{{ get_the_permalink($page_id) }}">{!! App::postTitle($page_id) !!}</option>
                @if($child_pages)
                    @foreach($child_pages as $child_page_id => $pages)
                        <option value="{{ get_the_permalink($child_page_id) }}">&#8212; {!!  App::postTitle($child_page_id) !!}</option>
                    @endforeach
                @endif
            @endforeach
        </select>
    </div>
@endif
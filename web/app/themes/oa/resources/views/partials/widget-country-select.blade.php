<ul class="nav nav-tabs nav-tabs__countries">
    <li class="nav-item dropdown dropdown__countries">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{__('USA','sage')}}</a>
        <div class="dropdown-menu dropdown-menu__countries">
            @foreach($countries_menu AS $country)
                <div class="menu-item menu-item__country">
                @if(count($country['country_links_repeater']) == 1)<a href="{!! $country['country_links_repeater'][0]['country_link']['url'] !!}" title="{!! $country['country_links_repeater'][0]['country_link']['title'] !!}" alt="{!! $country['country_links_repeater'][0]['country_link']['title'] !!}" target="{!! $country['country_links_repeater'][0]['country_link']['target'] !!}"/> @endif
                    <div class="country" @if(count($country['country_links_repeater']) > 1)data-toggle="popover" title="{!! count($country['country_links_repeater'] ) !!}{{' '.__('Sites Available','sage')}}"
                         data-content='
                        @foreach($country['country_links_repeater'] AS $country_links)
                                 <a href="{!! $country_links['country_link']['url'] !!}" title="{!! $country_links['country_link']['title'] !!}" alt="{!! $country_links['country_link']['title'] !!}" target="{!! $country_links['country_link']['target'] !!}">{!! $country_links['country_link']['title'] !!}</a></br>
                         @endforeach
                         ' @endif
                    >
                        <img class="country__flag" src="{!! $country['country_flag_icon']['sizes']['thumbnail'] !!}" title="{!! $country['country_name'] !!}" alt="{!! $country['country_name'] !!}"/>
                        <span class="country__name">{!! $country['country_name'] !!}</span>
                    </div>
                @if(count($country['country_links_repeater']) == 1) </a>@endif
                </div>
            @endforeach
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">{{__('Available in 20+ countries','sage')}}</a>
    </li>
</ul>
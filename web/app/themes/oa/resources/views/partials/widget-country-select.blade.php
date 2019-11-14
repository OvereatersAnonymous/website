<ul class="nav nav-tabs country-select">
    <li class="nav-item dropdown country-select--countries">
       <a class="nav-link dropdown-toggle country--USA" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{__('USA','sage')}}</a>
        <div class="dropdown-menu">
            @if($countries_menu)
                @foreach($countries_menu as $country)
                   
                        @if(count($country['country_links_repeater']) == 1)
                            <div class="menu-item country">
                                <a class="country--{!! $country['country_name']['value'] !!}" href="{!! $country['country_links_repeater'][0]['country_link']['url'] !!}" target="{!! $country['country_links_repeater'][0]['country_link']['target'] !!}">{!! $country['country_name']['label'] !!}</a>
                            </div>
                        @else
                            <div class="menu-item country"
                                data-toggle="popover"
                                title="{!! count($country['country_links_repeater'] ) !!}{{' '.__('Sites available','sage')}}"
                                data-content='
                                    @foreach($country['country_links_repeater'] AS $country_links)
                                             <a href="{!! $country_links['country_link']['url'] !!}" title="{!! $country_links['country_link']['title'] !!}" target="{!! $country_links['country_link']['target'] !!}">{!! $country_links['country_link']['title'] !!}</a></br>
                                     @endforeach
                                '>
                           
                                <a href="javascript:void(0);" class="country--{!! $country['country_name']['value'] !!}">{!! $country['country_name']['label'] !!}</a>
                            </div>
                                
                        @endif
                @endforeach
            @endif
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">{{__('Available in','sage')}}<br>{{__('20+ countries','sage')}}</a>
    </li>
</ul>




<!--
<div class="country--{!! $country['country_links_repeater'][0]['country_link']['title'] !!}" @if(count($country['country_links_repeater']) > 1)data-toggle="popover" title="{!! count($country['country_links_repeater'] ) !!}{{' '.__('Sites Available','sage')}}"
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

                    -->
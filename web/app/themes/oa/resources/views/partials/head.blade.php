<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  @if(App::authCheck())
	  <meta http-equiv="cache-control" content="private, max-age=0, no-cache, no-store"/>
	  <meta http-equiv="pragma" content="no-cache"/>
	  <meta http-equiv="expires" content="0"/>
  @endif
  
  @include('partials.head-google-trackers')
  @include('partials.head-cookiebot')
  @php wp_head() @endphp
</head>

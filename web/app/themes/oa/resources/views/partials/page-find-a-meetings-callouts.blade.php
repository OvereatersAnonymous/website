@if($find_a_meeting_callouts)
	<div class="find_a_meeting">
		<div class="row find_a_meeting">
			@foreach($find_a_meeting_callouts AS $callout)
				<div class="col-md-@if(count($find_a_meeting_callouts)==1) 12 @else 6 @endif find_a_meeting--callout">
					@include('partials.content-callout',['callout'=>$callout])
				</div>
			@endforeach
		</div>
	</div>
@endif
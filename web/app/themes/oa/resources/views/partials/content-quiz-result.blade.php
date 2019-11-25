<div class="card">
    <div class="card-body">
        <h5 class="card-title">{!! __('Recap','sage') !!}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{!! __('You have answered','sage') !!} &ldquo;{!! __('No','sage') !!}&rdquo; {!! __('To','sage') !!} {!! $wrong_answers !!} {!! __('questions and','sage') !!} &ldquo;{!! __('Yes','sage') !!}&rdquo; {!! __('To','sage') !!} {!! $correct_answers !!} {!! __(' questions','sage') !!}</h6>
        <p class="card-text quizzes--result">{!! $result['results'] !!}</p>
        @if($load_next_quiz)
            <button class="btn btn--quiz--next" value="next" type="button">{!! __('See more questions','sage') !!}</button>
        @endif
    </div>
</div>
@if(!empty($result['resources_repeater']))
    <div class="quizzes--quiz--resources">
        <div class="card">
            <div class="card-body">
                @foreach ($result['resources_repeater'] as $resource)
                    @include('partials.content-resource',['resource'=>$resource])
                @endforeach
            </div>
        </div>
    </div>
@endif

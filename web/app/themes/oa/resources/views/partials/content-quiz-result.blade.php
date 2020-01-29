<div class="results-card">
    <div class="results-body">
        <h4 class="results-title">{!! __('Recap','sage') !!}</h4>
        <div class="results-subtitle">{!! __('You have answered','sage') !!} &ldquo;{!! __('Yes','sage') !!}&rdquo; {!! __('To','sage') !!} {!! $correct_answers !!} {!! __('question(s) and','sage') !!} &ldquo;{!! __('No','sage') !!}&rdquo; {!! __('To','sage') !!} {!! $wrong_answers !!} {!! __(' question(s)','sage') !!}</div>
        <p class="results-text quiz-result">{!! $result['results'] !!}</p>
        @if($load_next_quiz)
            <button class="btn navyblack quiz-btn-next" value="next" type="button">{!! __('See more questions','sage') !!}</button>
        @endif
    </div>
</div>

@if(!empty($result['resources_repeater']) || !empty($result['results_resources_title']))
    <div class="quiz-resources">
        <div class="quiz-resources--card">
            <h3>{{ __('Available resources','sage') }}</h3>
            @if(!empty($result['results_resources_title']))
              <p>{!! $result['results_resources_title'] !!}</p>
            @endif
            @if(!empty($result['resources_repeater']))
              <div class="quiz-resources--body">
                  @foreach ($result['resources_repeater'] as $resource)
                      @include('partials.content-resource',['resource'=>$resource])
                  @endforeach
              </div>
            @endif
        </div>
    </div>
@endif

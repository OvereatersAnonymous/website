{{-- You must pass the post ID to this template as $item_id --}}
@foreach (App::get_repeater_field('questions_repeater',$item_id) as $key => $question)
    <div class="slide slide--{!! $key !!}">
        <div class="quiz-card">
            <div class="quiz-body">
                <div class="quiz-header"><h4>{!! get_the_title($item_id) !!}</h4></div>
                <div class="quiz-question">{!! $question['question'] !!}</div>
                <button class="btn navyblack quiz-btn" value="1" type="button">Yes</button> &nbsp;
                <button class="btn navyblack quiz-btn" value="0" type="button">No</button>
                @if(!empty($question['quote']))
                <div class="quiz-quote">
                    <div class="quiz-quote--text">{!! $question['quote'] !!}</div>
                    @if(!empty($question['quote_reference']))
                        <div class="quiz-quote--attribute">{!! $question['quote_reference'] !!}</div>
                    @endif
                </div>
                @endif
            </div>
        </div>
        @if(!empty($question['resources_repeater'])|| !empty($question['results_resources_title']))
        <div class="quiz-resources">
            <div class="quiz-resources--card">
                <h3>{{ __('Available resources','sage') }}</h3>
                @if(!empty($question['question_resources_title']))
                  <p>{!! $question['question_resources_title'] !!}</p>
                @endif
                @if(!empty($question['resources_repeater']))
                  <div class="quiz-resources--body">
                      @foreach ($question['resources_repeater'] as $resource)
                          @include('partials.content-resource',['resource'=>$resource])
                      @endforeach
                  </div>
                @endif
            </div>
        </div>
        @endif
    </div>
@endforeach

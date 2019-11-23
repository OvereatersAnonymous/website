{{-- You must pass the post ID to this template as $item_id --}}
@foreach (App::get_repeater_field('questions_repeater',$item_id) as $key => $question)
    <div class="quizzes--quiz--questions slide slide--{!! $key !!}">
        <div class="card">
            <div class="card-body">
                <div class="quizzes--quiz--question">{!! $question['question'] !!}</div>
                <button class="btn btn--quiz--slick" value="1" type="button">Yes</button>
                <button class="btn btn--quiz--slick" value="0" type="button">No</button>
                @if(!empty($question['quote']))
                <div class="quizzes--quiz--quote">
                    <div class="quizzes--quiz--quote--text">{!! $question['quote'] !!}</div>
                    @if(!empty($question['quote_reference']))
                        <div class="quizzes--quiz--quote--reference">{!! $question['quote_reference'] !!}</div>
                    @endif
                </div>
                @endif
            </div>
        </div>
        @dump($question)
        @if(!empty($question['resources_repeater']))
        <div class="quizzes--quiz--resources">
        <div class="card">
            <div class="card-body">
                @foreach ($question['resources_repeater'] as $resource)
                    <div class="quizzes--quiz--resource">
                        @dump($resource)
                        {!! $resource['icon'] !!}
                        <div class="quizzes--quiz--resource--link"><a href="{!! $resource['link']['url'] !!}" target="{!! $resource['link']['target'] !!}">{!! $resource['link']['title'] !!}</a></div>
                        <div class="quizzes--quiz--resource--type">{!! $resource['type'] !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        @endif
    </div>
@endforeach


<div class="card">
    <div class="card-body">
        <h5 class="card-title">{!! __('Recap','sage') !!}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{!! __('You have answered','sage') !!}&ldquo;{!! __('No','sage') !!}&rdquo;{!! __('To','sage') !!} {!! $quiz_no_count !!}  </h6>
        <p class="card-text quizzes--result">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        @if($load_next_quiz)
            <button class="btn btn--quiz--next" value="next" type="button">{!! __('See more questions','sage') !!}</button>
        @endif
    </div>
</div>

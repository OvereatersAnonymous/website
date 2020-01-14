<article @php post_class() @endphp>
  <div class="back-btn page-header">
    <i class="fas fa-chevron-left"></i> &nbsp; <a href="/podcasts?podcast-category={!! APP::get_uri_param('podcast-category') !!}&page={!! APP::get_uri_param('page') !!}&podcast-order={!! APP::get_uri_param('podcast-order') !!}">{!! _e('All podcasts','sage'); !!}</a>
  </div>
  <header> <h1 class="entry-title">{!! get_the_title() !!}</h1></header>
  {{--@include('partials/entry-meta')--}}
  @include('partials/content-subheader')
  @include('partials.content-featured-image')
<div class="entry-content">
  @php the_content() @endphp
</div>
  <div class="entry-content--links">
      @if(get_field("podcast_google_link"))
      <a href="{!! get_field('podcast_google_link'); !!}" class="google">
        <img src="@asset('images/en_badge_google.png')" alt="{!! _e('Get it on Google play','sage'); !!}">
      </a>
    @endif
    @if(get_field("podcast_itunes_link"))
      <a href="{!! get_field('podcast_itunes_link'); !!}" class="itunes">
        <img src="@asset('images/en_badge_itunes.png')" alt="{!! _e('Listen on Apple Podcasts','sage'); !!}">
      </a>
    @endif
  </div>
</article>

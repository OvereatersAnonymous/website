<article @php post_class() @endphp>
  <header> <h1 class="entry-title">{!! get_the_title() !!} PPP</h1></header>
  {{--@include('partials/entry-meta')--}}
  @include('partials/content-share')
  @include('partials.content-featured-image')
<div class="entry-content">
  @php the_content() @endphp
</div>
  <div class="entry-content__links">
    <a href="{!! get_field("podcast_google_link"); !!}" alt="" class="entry-content__podcast_link__google">
      <span>Google</span>
    </a>
    <a href="{!! get_field("podcast_itunes_link"); !!}" alt="" class="entry-content__podcast_link__itunes">
      <span>Itunes</span>
    </a>
  </div>
<footer>
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</footer>
@php comments_template('/partials/comments.blade.php') @endphp
</article>

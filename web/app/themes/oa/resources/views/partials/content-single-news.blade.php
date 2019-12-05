<article @php post_class() @endphp>
  <div class="back-btn">
    <i class="fas fa-chevron-left"></i> &nbsp; <a href="/news?news-category={!! APP::get_uri_param('news-category') !!}&page={!! APP::get_uri_param('page') !!}">{!! _e('All news','sage'); !!}</a>
  </div>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    {{--@include('partials/entry-meta')--}}
    @include('partials/content-share')
  </header>
  <div class="entry-content">
   @if(has_post_thumbnail(get_the_ID()))
      <img src="{{App::featuredImageSrc('medium@2x',get_the_ID())}}" data-src="{{App::featuredImageSrc('medium',get_the_ID())}}|{{App::featuredImageSrc('medium@2x',get_the_ID())}}" alt="{{ App::featuredImageAlt(get_the_ID()) }}" class="entry-content--featured-image" />
    @endif
    @php the_content() @endphp
  </div>
  
  {{--@php comments_template('/partials/comments.blade.php') @endphp--}}
</article>

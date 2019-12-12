<article @php post_class() @endphp>
  <header class="page-header"> <h1 class="entry-title">{!! get_the_title() !!}</h1></header>
  {{--@include('partials/entry-meta')--}}
  @include('partials/content-share')
<div class="entry-content">
  @php the_content() @endphp
</div>
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('', 'sage'), 'after' => '</p></nav>']) !!}
@php comments_template('/partials/comments.blade.php') @endphp
</article>

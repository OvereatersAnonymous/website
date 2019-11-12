{{--
  Template Name: News Listing Template
--}}

@extends('layouts.app')

@section('content')
    @include('partials.content-tabs-category-filter', ['terms'=>$news_categories,'active_tab'=>$news_category_request,'tab_query_string_param'=>'news-category','base_tab_url'=> APP::getPermalink()])
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @if( $news )
      <div class="news-listing-wrapper">
          @foreach ($news as $newsItem)
              <article @php(post_class())>
                  @include('partials.content-list-item', ['item_id'=>$newsItem->ID,'loop'=>$loop])
              </article>
          @endforeach
      </div>
      @if ($get_max_num_pages)
          @include('partials.pagination',['max_num_pages'=>$get_max_num_pages])
      @endif
  @else
      <div style="margin: 4rem 0;">
          <div class="alert alert-warning">{!! __("There are no news to display","sage") !!} </div>
          {!! get_search_form(false) !!}
      </div>
  @endif
  @endwhile
@endsection

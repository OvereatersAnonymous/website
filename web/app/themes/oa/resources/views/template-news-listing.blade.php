{{--
  Template Name: News Listing Template
--}}

@extends('layouts.app')

@section('tabs')
  <div class="container oa-tabs">
    <div class="row">
      <div class="col-12">
         @include('partials.content-tabs-category-filter', ['terms'=>$news_categories,'active_tab'=>$news_category_request,'tab_query_string_param'=>'news-category','base_tab_url'=> APP::getPermalink()])
      </div>
    </div>
  </div>
 
@endsection
@section('content')
  
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
    @if( $news )
      <div class="news-listing-wrapper">
          @foreach ($news as $newsItem)
              
            @include('partials.content-list-item', ['item_id'=>$newsItem->ID,'loop'=>$loop])
            
          @endforeach
      </div>
      @if ($get_max_num_pages)
        <div class="post-pagination">
          @include('partials.pagination',['max_num_pages'=>$get_max_num_pages])
        </div>
      @endif
    @else
        <div style="margin: 4rem 0;">
            <div class="alert alert-warning">{!! __("There are no news to display","sage") !!} </div>
            {!! get_search_form(false) !!}
        </div>
    @endif
  @endwhile
   
@endsection

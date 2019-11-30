{{--
  Template Name: Podcast Listing Template
--}}

@extends('layouts.app')

@section('tabs')
  <div class="container oa-tabs">
    <div class="row">
      <div class="col-12">
         @include('partials.content-tabs-category-filter', ['terms'=>$podcast_categories,'active_tab'=>$podcast_category_request,'tab_query_string_param'=>'podcast-category','base_tab_url'=> APP::getPermalink()])
      </div>
    </div>
  </div>
 
@endsection
@section('content')
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.page-header')
        @include('partials.content-page')
      @if( $podcasts )
          <div class="podcast-form">
            <form id="podcast-listing-form" name="podcast-listing-form" method='get' action="{!! APP::getPermalink() !!}">
                <h4><label for="podcast-sort-label">{!! _e("Sort","sage"); !!}</label></h4>
                <div class="styled-select slate">
                    <select id="podcast-order"" name="podcast-order" class="podcast-order select-field select-field--small select-field--white">
                        <option value="post_date" @if($podcast_order_request =='post_date') selected @endif>{!! _e("Date","sage"); !!}</option>
                        <option value="post_title" @if($podcast_order_request == 'post_title') selected @endif>{!! _e("Title","sage"); !!}</option>
                    </select>
                </div>
                @if($podcast_category_request)
                <input type="hidden" name="podcast-category" value="{!! $podcast_category_request !!}" />
                @endif
              </form>
          </div>
          <div class="podcast-listing-wrapper">
              @foreach ($podcasts as $podcastItem)
                  <article @php(post_class())>
                      @include('partials.content-list-podcast', ['item_id'=>$podcastItem->ID,'loop'=>$loop])
                  </article>
              @endforeach
          </div>
          @if ($get_max_num_pages)
              @include('partials.pagination',['max_num_pages'=>$get_max_num_pages])
          @endif
      @else
          <div style="margin: 4rem 0;">
              <div class="alert alert-warning">{!! __("There are no podcasts to display","sage") !!} </div>
              {!! get_search_form(false) !!}
          </div>
      @endif
      @endwhile
    </div>
    <div class="col-md-2">
    </div>
  </div>
@endsection

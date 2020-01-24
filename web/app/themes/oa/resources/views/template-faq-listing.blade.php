{{--
  Template Name: FAQ Listing Template
--}}

@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.page-header')
        @include('partials.content-subheader')
        @include('partials.content-page')
      @if(!empty($faq_category_request) && !empty($faqs))
          <div class="faq-listing-wrapper">
              <div class="faq-listing-nav">
                  <div class="faq-listing-nav--item back"><a class="link--back" href="{!! get_permalink() !!}"><i class="fa fa-chevron-left" style="font-size: 14px;"></i> {!! __("Back","sage") !!}</a></div>
                  <div class="faq-listing-nav--item expand-all"><a class="link--expand" href="#"><i class="fa fa-plus" style="font-size: 14px;"></i>  {!! __("Expand all","sage") !!}</a></div>
                  <div class="faq-listing-nav--item collapse-all"><a class="link--collapse" href="#"><i class="fa fa-minus" style="font-size: 14px;"></i> {!! __("Collapse all","sage") !!}</a></div>
              </div>
              <div class="faq-accordion" id="accordion">
                  @foreach ($faqs as $faq)
                      @include('partials.content-faq-card', ['item_id'=>$faq->ID,"loop"=>$loop])
                  @endforeach
              </div>
          </div>
      @elseif( !empty($faq_categories) )
          <div class="faq-category-listing-wrapper unveil-bg" @if(has_post_thumbnail(get_the_ID())) data-src="{{ App::featuredImageSrc('medium',get_the_ID()) }}|{{ App::featuredImageSrc('medium@2x',get_the_ID()) }}" @endif>
              @if(!empty($faq_top_categories) )
                  @include('partials.content-faq-category-group', ['category_group_name'=>__("Top FAQs","sage"),'category_group_terms'=>$faq_top_categories])
              @endif
              @foreach ($faq_categories as $faq_category)
                @if ( !empty($faq_category['child']) )
                  @include('partials.content-faq-category-group', ['category_group_name'=>$faq_category['parent']->name,'category_group_terms'=>$faq_category['child']])
                 @endif
              @endforeach
          </div>
      @else
          <div style="margin: 4rem 0;">
              <div class="alert alert-warning">{!! __("There are no FAQs to display","sage") !!} </div>
              {!! get_search_form(false) !!}
          </div>
      @endif
      @endwhile
    </div>
    <div class="col-md-2"></div>
  </div>
@endsection

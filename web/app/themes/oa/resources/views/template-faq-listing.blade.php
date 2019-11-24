{{--
  Template Name: FAQ Listing Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-share')
    @include('partials.content-page')
  @if(!empty($faq_category_request) && !empty($faqs))
      <div class="faq-listing-wrapper">
          <div class="faq-listing-nav">
              <div class="faq--back"><a class="link--back" href="{!! get_permalink() !!}">{!! __("Back","sage") !!}</a></div>
              <div class="faq--expand"><a class="link--expand" href="#">{!! __("Expand all","sage") !!}</a></div>
              <div class="faq--collapse"><a class="link--collapse" href="#">{!! __("Collapse all","sage") !!}</a></div>
          </div>
          <div class="faqs accordion" id="accordion">
              @foreach ($faqs as $faq)
                  @include('partials.content-faq-card', ['item_id'=>$faq->ID,"loop"=>$loop])
              @endforeach
          </div>
      </div>
  @elseif( !empty($faq_categories) )
      <div class="faq-category-listing-wrapper">
          @if(!empty($faq_top_categories) )
              @include('partials.content-faq-category-group', ['category_group_name'=>__("Top FAQs","sage"),'category_group_terms'=>$faq_top_categories])
          @endif
          @foreach ($faq_categories as $faq_category)
                  @include('partials.content-faq-category-group', ['category_group_name'=>$faq_category['parent']->name,'category_group_terms'=>$faq_category['child']])
          @endforeach
      </div>
  @else
      <div style="margin: 4rem 0;">
          <div class="alert alert-warning">{!! __("There are no faq to display","sage") !!} </div>
          {!! get_search_form(false) !!}
      </div>
  @endif
  @endwhile
@endsection
<div class="content-wrapper faq--group">
  <h2>{!! $category_group_name !!}</h2>
  <ul class="faq--group--child">
  @foreach($category_group_terms as $term)
      <li class="faq--group--child--item"><a href="{!! get_permalink() !!}?faq-category={!! $term->term_id !!}">{!! $term->name !!}</a></li>
  @endforeach
  </ul>
</div>
<div class="content-wrapper faq-group">
	<h3>{!! $category_group_name !!}</h3>
	@if ($category_group_terms)
		<ul class="faq-group--child">
			@foreach($category_group_terms as $term)
				<li class="faq-group--item"><a href="{!! get_permalink() !!}faq-cat/{!! $term->term_id !!}">{!! $term->name !!}</a></li>
			@endforeach
		</ul>
	@endif
</div>

@if(!App::authCheck())
	<div class="post-content"> 
		@php the_content() @endphp
		{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('', 'sage'), 'after' => '</p></nav>']) !!}
	</div>
@else
	@if(is_user_logged_in())
		<div class="post-content"> 
			@php the_content() @endphp
			{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('', 'sage'), 'after' => '</p></nav>']) !!}
		</div>
	@else
		@if(get_field('authentication_requirement_message'))
			<div>
				{!! get_field('authentication_requirement_message') !!}
			</div>
		@endif 
		{{ wp_login_form(array('remember'=>false)) }}
	@endif
@endif
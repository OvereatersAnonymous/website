<footer class="content-info">
  <div class="container primary-footer">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
   <div class="container secondary-footer">
    @php dynamic_sidebar('sidebar-legal') @endphp
  </div>
</footer>
<div class="top-link hide" id="js-top" title="@php _e('Back to top','sage'); @endphp">
  <i class="fa fa-angle-up" aria-hidden="true"></i>
  <span class="sr-only">@php _e("Back to top","sage"); @endphp</span>
</div>
@include('partials.footer-google-trackers')

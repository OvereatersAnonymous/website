<footer class="content-info">
  <div class="container primary-footer">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
   <div class="container secondary-footer">
    @php dynamic_sidebar('sidebar-legal') @endphp
  </div>
</footer>
<a class="top-link hide" href="javascript:void(0);" id="js-top" title="@php _e('Back to top','sage'); @endphp">
  <i class="fa fa-angle-up" aria-hidden="true"></i>
  <span class="sr-only">@php _e("Back to top","sage"); @endphp</span>
</a>
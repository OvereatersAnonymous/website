export default {
  finalize() {
    //Bootstrap Collapse functionality for faq listing
    jQuery('.faq-listing-nav .link--expand').on('click', function() {
      jQuery('.collapse').collapse('show');
    });
    jQuery('.faq-listing-nav .link--collapse').on('click', function() {
      jQuery('.collapse').collapse('hide');
    });
  },
};

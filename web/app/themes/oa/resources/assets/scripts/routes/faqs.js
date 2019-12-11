export default {
  finalize() {
    //Bootstrap Collapse functionality for faq listing
    jQuery('.faq-listing-nav .link--expand').on('click', function(event) {
       event.preventDefault();
       jQuery('.collapse').collapse('show');
    });
    jQuery('.faq-listing-nav .link--collapse').on('click', function(event) {
       event.preventDefault();
       jQuery('.collapse').collapse('hide');
    });
  },
};

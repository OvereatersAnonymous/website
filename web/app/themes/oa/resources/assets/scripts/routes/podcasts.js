export default {
  init() {
    jQuery('#podcast-order').on('change', function() {
      this.form.submit();
    });
  },
};

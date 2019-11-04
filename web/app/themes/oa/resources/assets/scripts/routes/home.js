export default {
  init() {
    // JavaScript to be fired on the home page
    jQuery('.hero-slider').slick({
      dots:true,
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

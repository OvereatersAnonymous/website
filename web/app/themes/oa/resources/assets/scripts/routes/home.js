export default {
  init() {
    // JavaScript to be fired on the home page
    
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    
    jQuery('.hero-slider').slick({
      dots:true,
      speed: 300,
      fade: true,
      arrows: false,
      cssEase: 'linear',
      adaptiveHeight: false,
      autoplaySpeed:10000,
      autoplay: true,
      pauseOnHover: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
          },
        },
        {
          breakpoint: 600,
          settings: {
          },
        },
        {
          breakpoint: 480,
          settings: {
          },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });
  },
};

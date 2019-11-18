export default {
  init() {

    // JavaScript to be fired on all pages
    jQuery('#primary-nav-toggle').bind('click', function(event) {
      event.preventDefault();
      jQuery(this).toggleClass('open');
      jQuery('.overlay-nav').css({ 'height': jQuery(document).height() }).fadeToggle();
      jQuery('html, body').animate({ scrollTop: 0 });
    })
    jQuery('#primary-nav-close').bind('click', function(event) {
      event.preventDefault();
      jQuery('.overlay-nav').fadeOut();
      jQuery('#primary-nav-toggle').removeClass('open');
      jQuery('#menu-primary-navigation .open').removeClass('open').find('ul').hide();
    })
    jQuery('#menu-primary-navigation .menu-item-has-children > a, #menu-collapsible-sidenavigation .menu-item-has-children > a').bind('click', function(event) {
      event.preventDefault();
      jQuery(this).parent().toggleClass('open').find('ul').slideToggle();
      //adjust overlay height
      //becuase we're animating the navigation items down, we have to wait for the animation to complete
      /*setTimeout(function () {
          jQuery('.overlay-nav').css({ 'height': jQuery(document).height() });
           jQuery('.subPageNav').trigger('sticky_kit:recalc');
      }, 1000);*/
    })

    //Search
    // JavaScript to be fired on all pages
    var $searchWrapper = jQuery('.search-wrapper');
    var $hat = jQuery('.hat');
    jQuery('#search-toggle--btn').bind('click', function(event) {
      event.preventDefault();
      jQuery(this).toggleClass('open');
      jQuery('.search-form').toggleClass('open');
      jQuery('.search').toggleClass('open');
      $searchWrapper.toggleClass('open');
      //set search field height
      $searchWrapper.css('height',$hat.outerHeight());
      //put cursor into field if open
       jQuery('.search-field').focus();
    })

    //automatically expand parent if we're on a subpage
    jQuery('#menu-primary-navigation .current-menu-parent, #menu-collapsible-sidenavigation .current-menu-parent').toggleClass('open').find('ul').slideToggle();

    //Logic to fire certain functions on resize, but only when resize has finished
    var resizeTimer;
    jQuery( window ).resize(function() {

      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() {
      }, 250);

    });
    //Enable popover on the country flag menu items
    jQuery('.country[data-toggle="popover"]').popover({
      html: true,
      placement: 'auto',

    });
    //Disable hiding dropdown menu on click
    jQuery('.country-select .dropdown-menu').on({
        'click':function(e){
            e.stopPropagation();
        },
    });
    //Manually hide popover if any are displaying when dropdown menu is hidden
    jQuery('.country-select').on('hide.bs.dropdown', function(){
        jQuery('.country[data-toggle="popover"]').popover('hide');
    });

    

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    //remove the badly aligned word from translate widget
    setTimeout(fireAfterDelay, 500);
    function fireAfterDelay(){
      var child = jQuery('.goog-logo-link').children('img');
      jQuery('.goog-logo-link').html(child);
    }
  },
};

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

    //add img unveil
    jQuery('img').unveil();
    //add unveil to bg images 
    jQuery('.unveil-bg').unveil();

     jQuery('.animsition').animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body',
        transition: function(url) { window.location.href = url; },
    }).one('animsition.inStart', function(){
      //transition finished
    });

    //trigger page load onChange for tab-selects
    // bind change event to select
    jQuery('#nav-select').on('change', function () {
        var url = jQuery(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    var moveElementsAround = function() {
      if (jQuery(window).width() < 720) {
        //in mobile view, move the language select into the overlay nav
        jQuery('.language-select-mobile').append( jQuery('#google_translate_element2') );
      } else {
        //in desktop view, keep it in header hat
        jQuery('.goog-lang').append( jQuery('#google_translate_element2') );
      }
    };

    //remove the badly aligned word from translate widget
    setTimeout(fireAfterDelay, 500);
    function fireAfterDelay(){
      var child = jQuery('.goog-logo-link').children('img');
      jQuery('.goog-logo-link').html(child);
      moveElementsAround();
    }

    //if we have tabs on page, see if they fit into the window width,
    //if not, switch to a select dropdown
    var $nav_tabs = jQuery('.nav-tabs.desktop');
    var $nav_select = jQuery('.nav-select.mobile');
    var toggleTabSelectNav = function() {
      //alert($nav_tabs.outerWidth(true) +' vs ' + jQuery(window).width());
      if ($nav_tabs.outerWidth(true) + 50 > jQuery(window).width()) {
        $nav_tabs.css('display','none');
        $nav_select.css('display','block');
      } else {
        $nav_tabs.css('display','flex');
        $nav_select.css('display','none');
      }
    }
    //fire on load
    toggleTabSelectNav();

    //Logic to fire certain functions on resize, but only when resize has finished
    var resizeTimer;
    jQuery( window ).resize(function() {

      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() {
        moveElementsAround();
        toggleTabSelectNav();
      }, 250);

    });
      
  },
};

export default {
  init() {

    //do not load from cache when back button is clicked
    //force a reload when page is loaded from bfcache.
    jQuery(window).bind('pageshow', function(event) {
      if (event.originalEvent.persisted) {
          window.location.reload() 
      }
    });

    // JavaScript to be fired on all pages
    jQuery('#primary-nav-toggle').bind('click', function(event) {
      //append #menu to URL to enable back btn functionality
      if (window.location.href.indexOf('#menu') > -1) {
        if ( jQuery('#primary-nav-toggle').hasClass('open')) {
          var noHashURL = window.location.href.replace(/#.*$/, '');
          window.history.replaceState('', document.title, noHashURL);
        }
      } else {
        window.location.href = window.location.href + '#menu';
      }

      event.preventDefault();
      jQuery(this).toggleClass('open');
      jQuery('.overlay-nav').fadeToggle();
      setOverlayHeight();
      jQuery('html, body').animate({ scrollTop: 0 });
    })
    jQuery('#primary-nav-close').bind('click', function(event) {
      event.preventDefault();
      jQuery('.overlay-nav').fadeOut();
      jQuery('#primary-nav-toggle').removeClass('open');
      jQuery('#menu-primary-navigation .open').removeClass('open').find('ul').hide();
    })

    window.onhashchange = function() {
     //remove nav if back button was used while the #menu hash is present
     if (window.location.href.indexOf('#menu') == -1) {
      if ( jQuery('#primary-nav-toggle').hasClass('open')) {
        jQuery('#primary-nav-close').click();
      }
     }
    }

    jQuery('#menu-primary-navigation .menu-item-has-children > a, #menu-collapsible-sidenavigation .menu-item-has-children > a').bind('click', function(event) {
      event.preventDefault();
      jQuery(this).parent().toggleClass('open').find('ul').slideToggle();
      //adjust overlay height
      //becuase we're animating the navigation items down, we have to wait for the animation to complete
      setOverlayHeight();
    })

    var setOverlayHeight = function() {
      setTimeout(function () {
          jQuery('.overlay-nav').css({ 'height': jQuery(document).height() });
          //alert(jQuery(document).height());
      }, 500);
    };

    //find any video embeds and make sure the embed-container class is added as wrapper
    //this ensures the vieos are mobile responsive
    var $content = jQuery('.post-content iframe');
    if($content.length) {
      $content.wrap( '<div class="video-container"></div>' );
    }


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

    //trigger page load onChange for tab-selects
    // bind change event to select
    jQuery('#nav-select').on('change', function () {
        var url = jQuery(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });

    //adjust dropdown nav child width, we want it to be at least the width of the parent, not auto width of child content
    //$navtabs = jQuery('.nav-tabs ')

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
      var combined_nav_width = 0;
      $nav_tabs.css('visibility','hidden');
      $nav_tabs.css('display','flex');
      jQuery('.nav-tabs.desktop .nav-item').each(function() {
        combined_nav_width += jQuery(this).width();
      });
      //alert(combined_nav_width);
      if (combined_nav_width > $nav_tabs.width()) {
        $nav_tabs.css('display','none');
        $nav_select.css('display','block');
      } else {
        $nav_tabs.css('display','flex');
        $nav_tabs.css('visibility','visible');
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


    // Set a variable for our button element.
    const scrollToTopButton = $('#js-top');

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopButton.css('display', 'block');
      } else {
        scrollToTopButton.css('display', 'none');
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      jQuery('html, body').animate({ scrollTop: 0 });
    }
    //Disable hiding dropdown menu on click
    scrollToTopButton.on({
        'click':function(e){
            e.preventDefault();
            topFunction();
        },
    });
    
    //Cookiebot Consent Requirement Script
    /* eslint-disable */
    //If user has not consented, show link and hide functionality
    if(!Cookiebot.consent.marketing) {
      jQuery('.cookiebot-consent-require').hide();
      jQuery('.cookiebot-consent-link').show();
    }
    //once user consents, enable the functionality
    window.addEventListener('CookiebotOnAccept', function (e) {
      if (Cookiebot.consent.marketing)
      {
        jQuery('.cookiebot-consent-require').show();
        jQuery('.cookiebot-consent-link').hide();
      }
    }, false);
    /* eslint-enable */
  },
};

// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

/*^*^*^**^*^*^*^*^*^*^*^*^*^*^*/
//Added by CLOUDRED */

// Import custom event pollyfill for IE support
import 'custom-event-polyfill';

//Import animsition library
import 'animsition/dist/js/animsition.min';

//Import slick
import 'slick-carousel/slick/slick';

//Import unviel
import 'unveil2/dist/jquery.unveil2.min';

//Import Cookie.js
import 'js.cookie/dst/Cookie.js';

//Import Font Awesome
import { config,library, dom } from '@fortawesome/fontawesome-svg-core';
// import the regular and solid icons
import { far } from '@fortawesome/free-regular-svg-icons';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
// allow Pseudo elements
config.searchPseudoElements=true;
// add the imported icons to the library
library.add(far, fas, fab);
// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();
//**** //END ******************/
/*^*^*^**^*^*^*^*^*^*^*^*^*^*^*/

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import podcasts from './routes/podcasts';
import faqs from './routes/faqs';
import quizzes from './routes/quizzes';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  //Podcasts
  podcasts,
  //Faqs
  faqs,
  //Quizzes
  quizzes,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());


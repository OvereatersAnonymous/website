// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

/*^*^*^**^*^*^*^*^*^*^*^*^*^*^*/
//Added by CLOUDRED */
//Import slick
import 'slick-carousel/slick/slick';
import 'unveil2/dist/jquery.unveil2.min';
//**** //END ******************/
/*^*^*^**^*^*^*^*^*^*^*^*^*^*^*/

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import podcasts from './routes/podcasts';

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
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

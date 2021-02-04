<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

	$ajax_params = array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'ajax_nonce' => wp_create_nonce('oa_ajax_nonce'),
	);

	wp_localize_script('sage/main.js', 'ajax_object', $ajax_params);

}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'header_navigation' => __('Header Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    // Add featured image sizes
    add_theme_support('post-thumbnails');
    add_image_size( 'thumbnail@2x', 300, 300, true);
    add_image_size( 'thumbnail@3x', 600, 600, true);
    //the following two are not made visible in admin b/c they are just the 1x of  medium and large
    //images set in WP Media Settings
    add_image_size( 'medium@2x', 700);
    add_image_size( 'large@2x', 1080);
    // Register filter is in filers.php

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Header', 'sage'),
        'id'            => 'sidebar-header'
    ] + $config);

    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);

    register_sidebar([
        'name'          => __('Legal', 'sage'),
        'id'            => 'sidebar-legal'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});


// Cloudred.com
//  .-.-.   .-.-.   .-.-.   .-.-.   .-.-.   .-.-.   .-.-.   .-.-
// / / \ \ / / \ \ / / \ \ / / \ \ / / \ \ / / \ \ / / \ \ / / \
//`-'   `-`-'   `-`-'   `-`-'   `-`-'   `-`-'   `-`-'   `-`-'

//Logo support
function theme_prefix_setup() {

    add_theme_support( 'custom-logo', array(
        'height'      => 63,
        'width'       => 230,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

}
add_action( 'after_setup_theme', 'App\\theme_prefix_setup' );

//change the default WP login screen logo
function oa_login_logo() {

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <style type="text/css">
        .login {
            background-color: #ccc;
        }
        .login #login {
            width:50%;
        }
        <?php if ($logo) { ?>
            .login #login h1 a {
                background-image: url('<?php echo $logo[0]; ?>');
                background-size:100% auto;
                width:230px;
                height:63px;
            }
            @media (max-width: 768px) {
              .login #login { width:95%;}
            }
        <?php } ?>
    </style>
<?php }
add_action( 'login_enqueue_scripts','App\\oa_login_logo', 1 );

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'App\\add_file_types_to_uploads');


//Remove emoji scripts introduced by WP 4.2
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'App\\disable_emojicons_tinymce' );

}
add_action( 'init', 'App\\disable_wp_emojicons' );


function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current_year', 'App\\year_shortcode');

/**
 * Include google translate javascript script
 */
function oa_google_translate_enqueue_scripts (){
	wp_enqueue_script('google_translate', 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2', null, null, true);

}
add_action( 'wp_enqueue_scripts', 'App\\oa_google_translate_enqueue_scripts',100 );

/**
 * Inject critical assets in head as early as possible
 */
add_action('wp_head', function (): void {
    //Comment out for now since we want to be constantly testing
    /*if ('development' === env('WP_ENV')) {
        return;
    }*/
    $critical_CSS = 'styles/critical.css';
    if (file_exists(locate_asset($critical_CSS))) {

        echo '<style id="critical-css">' . get_file_contents($critical_CSS) . '</style>';
    }

    $critical_JS = 'scripts/critical.js';
    if (file_exists(locate_asset($critical_JS))) {
        echo '<script id="critical-js">' . get_file_contents($critical_JS) . '</script>';
    }
}, 1);
//_/~\_/~\_/~\_/~\_/~\_/~\_/~\_/~\_/~\_/~\_/~\_/~\_/~\_/~\_
// END

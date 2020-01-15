<?php
/**
 * Actions/Filter functions for code related to redirects
 */

namespace App;

/**
 * Add rewrite rule for podcasts listing pretty url
 *
 * @hook rewrite_rules_array
 * @return array
 */
function oa_add_rewrite_rules_podcasts($aRules) {
	$aNewRules = array('podcasts/page/?([0-9]{1,})/?$' => 'index.php?pagename=podcasts&paged=$matches[1]');
	$aRules = $aNewRules + $aRules;
	return $aRules;
}
add_filter('rewrite_rules_array', 'App\\oa_add_rewrite_rules_podcasts');

/**
 * Add rewrite rule for news listing pretty url
 *
 * @hook rewrite_rules_array
 * @return array
 */
function oa_add_rewrite_rules_news($aRules) {
	$aNewRules = array('news/page/?([0-9]{1,})/?$' => 'index.php?pagename=news&paged=$matches[1]');
	$aRules = $aNewRules + $aRules;
	return $aRules;
}
add_filter('rewrite_rules_array', 'App\\oa_add_rewrite_rules_news');

/**
 * Add query_var for faq category filter
 *
 * @hook query_vars
 * @return array
 */
function oa_add_query_vars_faqs($aVars) {
    $aVars[] = "faq-cat";
    return $aVars;
}
add_filter('query_vars', 'App\\oa_add_query_vars_faqs');

/**
 * Add rewrite rule for faq category filter pretty url
 *
 * @hook rewrite_rules_array
 * @return array
 */
function oa_add_rewrite_rules_faqs($aRules) {
    $aNewRules = array('faqs/faq-cat/?([0-9]{1,})/?$' => 'index.php?pagename=faqs&faq-cat=$matches[1]');
    $aRules = $aNewRules + $aRules;
    return $aRules;
}
add_filter('rewrite_rules_array', 'App\\oa_add_rewrite_rules_faqs');

/**
 * Add redirect of search to custom url for the google results
 *
 * @hook template_redirect
 */
function oa_google_search_results_url_rewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		$post_id = get_field('google_search_results_page','option');
		if(!empty($post_id)){
			$path = get_permalink($post_id);
		}
		wp_redirect( $path."?q=". urlencode( get_query_var( 's' ) ) );
		exit();
	}
}
add_action( 'template_redirect', 'App\\oa_google_search_results_url_rewrite' );

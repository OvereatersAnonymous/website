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
<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplatePodcastListing extends Controller
{
	var $podcasts;
	var $paged;
	var $sortOrder;
	var $sortOrderBy;
	var $podcastCategory;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		//Podcast Order filter
		$this->sortOrder ='DESC';
		$this->sortOrderBy ='post_date';
		if( !empty($_REQUEST['podcast-order']) ){
			$this->sortOrderBy = sanitize_text_field( $_REQUEST['podcast-order'] );
			switch($this->sortOrderBy){
				case"post_title":
					$this->sortOrder ='ASC';
					break;
				default:
					$this->sortOrder ='DESC';
					break;
			}
		}
		//Podcast Categories filter
		$this->podcastCategory ='';
		if( !empty($_REQUEST['podcast-category']) ){
			$this->podcastCategory = (int)$_REQUEST['podcast-category'];
		}

		$this->paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}
	/**
	 * Return podcasts listing
	 *
	 * @return mixed
	 */
	public function podcasts()
	{
		$pParamHash = array(
			'post_type' => 'podcasts',
			'posts_per_page' => 10,
			'post_status' => 'publish',
			'orderby' => $this->sortOrderBy,
			'order' => $this->sortOrder,
			'paged'=>$this->paged
		);
		if (!empty($this->podcastCategory) ){
			$pParamHash['tax_query'] =  array(
				'relation'      => 'AND',
				'0'=> array(
					'taxonomy'	 => 'podcast_category',
					'field'    => 'term_id',
					'terms'    => array($this->podcastCategory),
					'operator' => 'IN',
				)
			);
		}
		return $this->podcastQuery($pParamHash);
	}
	/**
	 * Return max page for pagination
	 *
	 * @return int
	 */
	public function getMaxNumPages() {
		return $this->podcasts->max_num_pages;
	}
	/**
	 * Run wp_query
	 *
	 * @return int
	 */
	private function podcastQuery($pParamHash){
		$this->podcasts = new WP_Query( $pParamHash );
		if($this->podcasts->posts){
			return $this->podcasts->posts;
		}else{
			return false;
		}

	}
	/**
	 * Return podcast categories
	 *
	 * @return array
	 */
	public function podcastCategories() {
		return App::getPostCategories('podcast_category');
	}

	/**
	 * Return podcast request category
	 *
	 * @return string
	 */
	public function podcastCategoryRequest() {
		return $this->podcastCategory;
	}

	/**
	 * Return podcast request orderby
	 *
	 * @return string
	 */
	public function podcastOrderRequest() {
		return $this->sortOrderBy;
	}
}

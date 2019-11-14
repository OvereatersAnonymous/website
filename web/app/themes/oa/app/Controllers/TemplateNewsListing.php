<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateNewsListing extends Controller
{
	var $news;
	var $newsCategory;
	/**
	 * Constructor
	 *
	 */
	function __construct()
	{

		//Podcast Categories filter
		$this->newsCategory ='';
		if( !empty($_REQUEST['news-category']) ){
			$this->newsCategory = (int)$_REQUEST['news-category'];
		}

		$this->paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}
	public function news()
	{
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$pParamHash = array(
			'post_type' => 'news',
			'posts_per_page' => 8,
			'post_status' => 'publish',
			'orderby' => 'post_date',
			'order' => 'DESC',
			'paged'=>$paged
		);
		if (!empty($this->newsCategory) ){
			$pParamHash['tax_query'] =  array(
				'relation'      => 'AND',
				'0'=> array(
					'taxonomy'	 => 'news_category',
					'field'    => 'term_id',
					'terms'    => array($this->newsCategory),
					'operator' => 'IN',
				)
			);
		}
		return $this->newsQuery($pParamHash);
	}
	/**
	 * Return max page for pagination
	 *
	 * @return int
	 */
	public function getMaxNumPages() {
		return $this->news->max_num_pages;
	}
	/**
	 * Get Latest News
	 *
	 * @return array
	 */
	public static function latestNews(){
		$pParamHash = array(
			'post_type' => 'news',
			'posts_per_page' => 1,
			'post_status' => 'publish',
			'orderby' => 'post_date',
			'order' => 'DESC',
		);
		$news = new WP_Query( $pParamHash);
		if($news->post_count){
			return $news->next_post();
		}else{
			return false;
		}
	}

	private function newsQuery($pParamHash){
		$this->news = new WP_Query( $pParamHash );
		if($this->news->posts){
			return $this->news->posts;
		}else{
			return false;
		}

	}

	/**
	 * Return podcast request category
	 *
	 * @return string
	 */
	public function newsCategoryRequest() {
		return $this->newsCategory;
	}

	/**
	 * Return news categories
	 *
	 * @return array
	 */
	public function newsCategories() {
		return App::getPostCategories('news_category');
	}
}

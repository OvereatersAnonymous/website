<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateNewsListing extends Controller
{
	var $news;
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
			return array();
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
}

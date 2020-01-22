<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateFaqListing extends Controller
{
	var $faqs;
	var $faqCategory;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		//Faq Categories filter
		$this->faqCategory ='';
        $category = get_query_var( 'categories' );
		if( !empty($category) ){
            $term = get_term_by('slug', (string)$category, 'faq_category');
            if(!empty($term)){
                $this->faqCategory = $term->term_id;
            }

		}
	}
	/**
	 * Return faqs listing
	 *
	 * @return mixed
	 */
	public function faqs()
	{

		if (!empty($this->faqCategory) ){
			$pParamHash = array(
				'post_type' => 'faqs',
				'posts_per_page' => -1,
				'post_status' => 'publish',
                'orderby' => 'title',
                'order' => 'asc',
			);
			$pParamHash['tax_query'] =  array(
				'relation'      => 'AND',
				'0'=> array(
					'taxonomy'	 => 'faq_category',
					'field'    => 'term_id',
					'terms'    => array($this->faqCategory),
					'operator' => 'IN',
				)
			);
			return $this->faqQuery($pParamHash);
		}
		return false;
	}
	/**
	 * Run wp_query
	 *
	 * @return int
	 */
	private function faqQuery($pParamHash){
		$this->faqs = new WP_Query( $pParamHash );
		if($this->faqs->posts){
			return $this->faqs->posts;
		}else{
			return false;
		}

	}
	/**
	 * Return faq categories
	 *
	 * @return mixed
	 */
	public function faqCategories() {

		$faqTerms = get_terms( array(
			'taxonomy' => "faq_category",
			'hide_empty' => true,
			'orderby'    => 'name',
			'order'      => 'ASC',
		) );

		if(!empty($faqTerms)){
			$faqHash = array();
			foreach ($faqTerms as $term){
				if($term->parent==0){
					$faqHash[$term->term_id]['parent'] = $term;
				}else{
					$faqHash[$term->parent]['child'][] = $term;
				}
			}
			return $faqHash;
		}

		return false;
	}

	/**
	 * Return top categories
	 *
	 * @return mixed
	 */
	public function faqTopCategories() {

		$faqTerms = get_terms( array(
			'taxonomy' => "faq_category",
			'hide_empty' => true,
			'orderby'    => 'count',
			'order'      => 'DESC',
			'childless' => true,
			'number' => 5
		) );
		if(!empty($faqTerms)){
			return $faqTerms;
		}

		return false;
	}

	/**
	 * Return faq request category
	 *
	 * @return string
	 */
	public function faqCategoryRequest() {
		return $this->faqCategory;
	}

}

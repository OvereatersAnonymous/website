<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateQuizzes extends Controller
{
	var $quizzes;
	var $oa_quiz_id;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		if(!empty($_COOKIE['oa_quiz_id'])){
			$this->oa_quiz_id = (int) $_COOKIE['oa_quiz_id'];
		}

		// handle ajax requests
		add_action( 'wp_ajax_ajaxTest', [$this, 'ajaxTest'] );
		add_action( 'wp_ajax_nopriv_ajaxTest', [$this, 'ajaxTest'] );
	}
	/**
	 * Return quizzes
	 *
	 * @return mixed
	 */
	public function quizzes()
	{

		$pParamHash = array(
			'post_type' => 'quizzes',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'orderby'=>'menu_order',
			'order' => 'ASC'
		);
		return $this->quizzesQuery($pParamHash);

	}
	/**
	 * Run wp_query
	 *
	 * @return int
	 */
	private function quizzesQuery($pParamHash){
		$this->quizzes = new WP_Query( $pParamHash );
		if($this->quizzes->posts){
			return $this->quizzes->posts;
		}else{
			return false;
		}

	}

	public static function ajaxTest(){
		$pParamHash = array();
		$pParamHash['ajaxtest'] = true;
		wp_send_json_success($pParamHash);
	}
}

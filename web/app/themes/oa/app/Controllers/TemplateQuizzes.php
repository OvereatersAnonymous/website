<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateQuizzes extends Controller
{
	var $quizzes;
	var $paged;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		if(!empty($_COOKIE['oa_quiz_page'])){
			$this->paged = (int) $_COOKIE['oa_quiz_page'];
		}

		// handle ajax requests
		add_action( 'wp_ajax_ajaxQuizzes', [$this, 'ajaxQuizzes'] );
		add_action( 'wp_ajax_nopriv_ajaxQuizzes', [$this, 'ajaxQuizzes'] );
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
			'posts_per_page' => 1,
			'post_status' => 'publish',
			'orderby'=>'menu_order',
			'order' => 'ASC',
			'paged'=>$this->paged,
		);
		return $this->quizzesQuery($pParamHash);

	}
	/**
	 * Run wp_query
	 *
	 * @return mixed
	 */
	private function quizzesQuery($pParamHash){
		$this->quizzes = new WP_Query( $pParamHash );
		if($this->quizzes->posts){
			return $this->quizzes->posts;
		}else{
			return false;
		}

	}

	public static function ajaxQuizzes(){
		$pParamHash = array();
		$request = (string) $_GET['request'];

		switch($request){
			case 'quizResult':
					$pParamHash['getresult'] = 'yay';
					$data['action'] = 'pass variable';
				$pParamHash['content'] = \App\template('partials.content-quiz',$data);



				break;
			case 'nextQuiz':

				break;
		}
		$pParamHash['ajaxtest'] = true;
		wp_send_json_success($pParamHash);
	}
}

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
		
		// Get quiz set page from cookie.
		if(!empty($_COOKIE['oa_quiz_page'])){
			$this->paged = (int) $_COOKIE['oa_quiz_page'];

		}else{
			$this->paged = 1;
		}
		// Set up ajax function listener
		add_action( 'wp_ajax_ajaxQuizzes', [$this, 'ajaxQuizzes'] );
		add_action( 'wp_ajax_nopriv_ajaxQuizzes', [$this, 'ajaxQuizzes'] );
	}
	/**
	 * Returns a single quiz set
	 *
	 * @return mixed
	 */
	public function quiz()
	{
		return TemplateQuizzes::quizzesList($this->paged);
	}
	/**
	 * Static function to query a single quiz
	 *
	 * @param int $paged
	 *
	 * @return mixed
	 */
	public static function quizzesList($paged)
	{
		$pParamHash = array(
			'post_type' => 'quizzes',
			'posts_per_page' => 1,
			'post_status' => 'publish',
			'orderby'=>'menu_order',
			'order' => 'ASC',
			'paged'=>$paged,
		);
		$quizzes = new WP_Query( $pParamHash );
		if($quizzes->posts){
			return $quizzes->posts;
		}else{
			return false;
		}
	}
	/**
	 * Function that handles the ajax requests
	 *
	 * @return mixed
	 */
	public static function ajaxQuizzes(){
		//Array hash to return to browser
		$pParamHash = array();
		//Get variables from ajax request
		$request = (string) $_REQUEST['request'];
		$oa_quiz_page = (int)$_REQUEST['oa_quiz_page'];
		$template_variables = array();
		switch($request) {
			//Get the quiz results ajax call
			case 'quizResult':
				// Check the referrer for the ajax call (setup.php creates nonce)
				check_ajax_referer( 'oa_ajax_nonce', 'oa_quiz_result_nonce' );
				$pParamHash['content_quiz_result'] ='';
				$pid = (int)$_REQUEST['pid'];
				$quizScore = (int)$_REQUEST['quizScore'];
				if (isset($pid)) {
					//Check if post id passed from ajax call exists
					$posts = new WP_Query(array('p' => $pid, 'post_type' => 'quizzes'));
					if ($post = $posts->next_post()) {
						// Set up score counters
						$questions = App::get_repeater_field('questions_repeater', $post->ID);
						if (!empty($questions)) {
							$total_questions = count($questions);
							$template_variables['correct_answers'] = $quizScore;
							$template_variables['wrong_answers'] = $total_questions - $quizScore;
						}
						// Check if there is a next quiz to load
						$nextQuizPage = $oa_quiz_page + 1;
						$nextQuiz = TemplateQuizzes::quizzesList($nextQuizPage);
						if (!empty($nextQuiz)) {
							$pParamHash['load_next_quiz'] = $template_variables['load_next_quiz'] = true;
						} else {
							$pParamHash['load_next_quiz'] = $template_variables['load_next_quiz'] = false;
						}
						//Get the results and loop to match the score
						$results = App::get_repeater_field('answers_results_repeater', $post->ID);
						foreach ($results as $result) {
							if ($result['number_correct'] == $quizScore) {
								$template_variables['result'] = $result;
								//Render markup
								$pParamHash['content_quiz_result'] = \App\template('partials.content-quiz-result', $template_variables);
								break;
							}
						}

					}
				}
			break;
			//Get the next quiz ajax call
			case 'loadNextQuiz':
				// Check the referrer for the ajax call (setup.php creates nonce)
				check_ajax_referer( 'oa_ajax_nonce', 'oa_load_next_quiz_nonce' );
				//Get the next quiz
				$nextQuiz = TemplateQuizzes::quizzesList($oa_quiz_page);
				if (!empty($nextQuiz[0])) {
					$template_variables['item_id'] = $nextQuiz[0]->ID;
					//Render markup
					$pParamHash['content_quiz'] = \App\template('partials.content-quiz', $template_variables);
					$pParamHash['pid'] = $nextQuiz[0]->ID;
				}else{
					$pParamHash['content_quiz'] = '';
				}
			break;
		}
		//Return to browser with data hash
		wp_send_json_success($pParamHash);
	}
}

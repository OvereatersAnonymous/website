<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
	/**
	 * Get homepage hero slide content
	 *
	 * @return array
	 */
	public function homepageSlider(){
		$homepageSlider = App::get_repeater_field('hero_slider');
		if(!empty($homepageSlider) ){
			return $homepageSlider;
		}
		return false;
	}

	/**
	 * Get Latest News
	 *
	 * @return array
	 */
	public function latestNews(){
		//return TemplateNewsListing::getLatestNews();
	}
}

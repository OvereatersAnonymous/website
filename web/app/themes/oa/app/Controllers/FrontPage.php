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
	 * Get Custom Callout
	 *
	 * @return array
	 */
	public function customCallout(){
		return $this->getCallout('custom');
	}

	/**
	 * Get Podcast Callout
	 *
	 * @return array
	 */
	public function podcastCallout(){
		$podcastHash = $this->getCallout('podcast');
		//Get Image
		$podcast_home_image = App::get_field('podcast_home_image');
		if($podcast_home_image) {
			$podcastHash['podcast_home_image'] = App::get_field('podcast_home_image');
		}
		if($podcastHash) {
			return $podcastHash;
		}else {
			return false;
		}
	}

	/**
	 * Get News Callout
	 *
	 * @return array
	 */
	public function newsCallout(){
		return $this->getCallout('news');
	}

	/**
	 * Get Callout
	 *
	 * @return mixed
	 */
	private function getCallout($callout_type){
		$callout = App::get_field($callout_type.'_home');
		if(!empty($callout) ){
			return $callout;
		}
		return false;
	}

	/**
	 * Get Latest News
	 *
	 * @return array
	 */
	public function latestNews(){
		return TemplateNewsListing::latestNews();
	}
}

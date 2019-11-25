<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class TemplateFindAMeeting extends Controller
{
	/**
	 * Return find a meeting callouts
	 *
	 * @return mixed
	 */
	public function findAMeetingCallouts(){
		return APP::get_repeater_field("find_a_meeting_callouts");
	}
}

<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html Gpl v3 or later
 * @version $Id: Weekday.php 
 *
 * @package Piwik_Weekday
 */

class Piwik_Weekday extends Piwik_Plugin
{

	public function getInformation()
	{
		return array(
			'name' => 'Weekday Plugin',
			'description' => 'Weekday Plugin: This plugin shows key figures for the different weekdays.',
			'author' => 'Blizzz',
			'author_homepage' => 'http://www.hz-online.de',
			'version' => '0.2',
			'translationAvailable' => true,
		);
	}

	public function postLoad()
	{
		Piwik_AddWidget('Weekday', Piwik_Translate('Weekday_Caption_Evolution'), 'Weekday', 'getWeekdayVisitsStatistics');
	}

}
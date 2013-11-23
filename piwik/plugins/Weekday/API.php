<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html Gpl v3 or later
 * @version $Id: API.php 
 *
 * @package Piwik_Weekday
 */


/**
 *
 * @package Piwik_Weekday
 */

class Piwik_Weekday_API
{

	static private $instance = null;
	static public function getInstance()
	{
		if (self::$instance == null)
		{
			$c = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}

	/**
	*	Fetches visits per weekday for the given period. Note that 'period' is extended!
	*
	*	@param	int		The Piwik-ID of the site
	*	@param	string	Extended period (possible values: day, week, month, quarter, halfyear, year)
	*	@param	string	The date as start of the back calculation
	*	@param	string	optional. API method from which to get the data
	*	@return	array	Assoc. array with localised weekday names as key or false when too many 0s
	*/
	protected function getWeekdayStatistic($idSite, $period, $date, $method = 'VisitsSummary.getVisits')
	{
		$date = Piwik_Date::factory($date);

		$weekdayArray = array( Piwik_Translate('Weekday_Weekday_Mon')	=> 0,
							   Piwik_Translate('Weekday_Weekday_Tue')	=> 0,
							   Piwik_Translate('Weekday_Weekday_Wed')	=> 0,
							   Piwik_Translate('Weekday_Weekday_Thu')	=> 0,
							   Piwik_Translate('Weekday_Weekday_Fri')	=> 0,
							   Piwik_Translate('Weekday_Weekday_Sat')	=> 0,
							   Piwik_Translate('Weekday_Weekday_Sun')	=> 0,
							);

		$requestStringTemplate = 'method=' . $method .'&idSite=' . $idSite . '&date={DATE}&period=day&format=original';
		$limitRate = 0.075;

		switch ($period)
		{
			case 'year':
				$weeks = 52;
				break;

			case 'quarter':
				$weeks = 52 / 4;
				break;

			case 'halfyear':
				$weeks = 52 / 2;
				break;

			case 'day':
			case 'week':
				$weeks = 1;
				$limitRate = 1;
				break;

			case 'month':
			default:
				$weeks = 4;
		}

		#get the values for the past four weeks
		$days = $weeks * 7;
		$zerosAllowed = ceil($days * $limitRate);
		$zerosFetched = 0;
		for($i = 0; $i < $days; $i++)
		{
			$requestString = str_replace('{DATE}', $date->toString(), $requestStringTemplate);
			$request = new Piwik_API_Request($requestString);

			$iValue = $request->process();
			if($iValue == 0)
			{
				$zerosFetched++;
				if($zerosFetched > $zerosAllowed) {
					return false;
				}
			}
			$sWeekday = Piwik_Translate('Weekday_Weekday_' .  $date->toString('D'));
			$weekdayArray[$sWeekday] += $iValue;
			$date = $date->subDay(1);
		}

		return $weekdayArray;
	}

	/**
	*	Collects visits per Day on a period base, calculates the average value and makes it up in a DataTable
	*
	*	@param	int					The id of the site :)
	*	@param	string				The selected period (not used)
	*	@param	string				The selected date
	*	@return	Piwik_DataTable		Resulting weekday data, designed for EvolutionGraph
	*/
	public function getWeekdayVisitsStatistics ($idSite, $period, $date)
	{
		Piwik::checkUserHasViewAccess( $idSite );

		$week = $this->getWeekdayStatistic($idSite, 'week', $date);
		$month = $this->getWeekdayStatistic($idSite, 'month', $date);
		$quarter = $this->getWeekdayStatistic($idSite, 'quarter', $date);
		$halfyear = $this->getWeekdayStatistic($idSite, 'halfyear', $date);
		$year = $this->getWeekdayStatistic($idSite, 'year', $date);

		$arrResult = array();

		foreach(array_keys($week) as $weekday)
		{
			$arrResult[$weekday] = array();

			$arrResult[$weekday][Piwik_Translate('Weekday_Period_LastWeek')] = floor($week[$weekday]);
			if($month)
			{
				$arrResult[$weekday][Piwik_Translate('Weekday_Period_LastMonth')] = floor($month[$weekday] / 4);
			}
			if($quarter)
			{
				$arrResult[$weekday][Piwik_Translate('Weekday_Period_LastQuarter')] = floor($quarter[$weekday] /  13);
			}
			if($halfyear)
			{
				$arrResult[$weekday][Piwik_Translate('Weekday_Period_LastHalfYear')] = floor($halfyear[$weekday] / 26);
			}
			if($year)
			{
				$arrResult[$weekday][Piwik_Translate('Weekday_Period_LastYear')] = floor($year[$weekday] / 52);
			}
		}

		$dataTable = new Piwik_DataTable();
		$dataTable->addRowsFromArrayWithIndexLabel($arrResult);

		return $dataTable;
	}

}
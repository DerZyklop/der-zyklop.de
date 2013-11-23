<?

class Piwik_Weekday_Controller extends Piwik_Controller
{
	public function getWeekdayVisitsStatistics($fetch = false)
	{
		$view = Piwik_ViewDataTable::factory( 'graphEvolution');
		$view->init( $this->pluginName,  __FUNCTION__, "Weekday.getWeekdayVisitsStatistics" );

		$view->disableSearchBox();

		return $this->renderView($view, $fetch);
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/12/13
 * Time: 16:37
 */

namespace ebussola\ads\reports\adwords;

/**
 * Interface StatsReport
 * @package ebussola\ads\reports\adwords
 *
 * @property float $average_position
 *
 * @property float $conversion_rate
 * @property int $conversions
 * @property int $cost_per_conversion
 * @property int $view_through_conversion
 *
 * @property float $conversion_rate_many_per_click
 * @property int $conversions_many_per_click
 * @property int $cost_per_conversion_many_per_click
 */
interface StatsReport extends \ebussola\ads\reports\StatsReport {

    /**
     * @return bool
     */
    public function isOnePerClick();

    /**
     * @return bool
     */
    public function isManyPerClick();

    /**
     * @return bool
     */
    public function hasConversions();

}
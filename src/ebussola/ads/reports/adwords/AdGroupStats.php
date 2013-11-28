<?php
/**
 * Created by PhpStorm.
 * User: marilanaro
 * Date: 11/28/13
 * Time: 2:03 PM
 */

namespace ebussola\ads\reports\adwords;


use ebussola\ads\reports\Stats;

/**
 * Interface AdGroupStats
 * @package ebussola\ads\reports\adwords
 *
 * @property int $campaign_id
 * @property string $campaign_name
 *
 * @property float $average_position
 *
 * @property float $conversion_rate
 * @property int $conversions
 * @property int $cost_per_conversion
 * @property int $view_through_conversions
 *
 * @property float $conversion_rate_many_per_click
 * @property int $conversions_many_per_click
 * @property int $cost_per_conversion_many_per_click
 */
interface AdGroupStats extends Stats {

}
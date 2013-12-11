<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 17:40
 */

namespace ebussola\ads\reports\adwords;

use ebussola\ads\reports\Stats;

/**
 * Interface SiteStats
 * @package ebussola\ads\reports\adwords
 *
 * @property int $campaign_id
 * @property string $campaign_name
 * @property int $adgroup_id
 * @property string $adgroup_name
 * @property string $placement_url
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
interface SiteStats extends Stats {

} 
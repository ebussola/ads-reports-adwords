<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 14:33
 */

namespace ebussola\ads\reports\adwords;


use ebussola\ads\reports\Stats;

/**
 * Interface AdStats
 * @package ebussola\ads\reports\adwords
 *
 * @property string $ad_group_name
 * @property string $campaign_name
 * @property string $campaign_id
 * @property string $destination_url
 * @property string $description1
 * @property string $description2
 * @property string $display_url
 * @property string $headline
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
interface AdStats extends Stats {

}
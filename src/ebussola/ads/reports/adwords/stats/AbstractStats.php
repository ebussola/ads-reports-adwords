<?php
/**
 * Created by PhpStorm.
 * User: marilanaro
 * Date: 11/28/13
 * Time: 2:12 PM
 */

namespace ebussola\ads\reports\adwords\stats;


use ebussola\ads\reports\stats\Stats;

class AbstractStats extends Stats {

    /**
     * @var float
     */
    public $average_position;

    /**
     * @var float
     */
    public $conversion_rate;

    /**
     * @var int
     */
    public $conversions;

    /**
     * @var int
     */
    public $cost_per_conversion;

    /**
     * @var int
     */
    public $view_through_conversion;

    /**
     * @var float
     */
    public $conversion_rate_many_per_click;

    /**
     * @var int
     */
    public $conversions_many_per_click;

    /**
     * @var int
     */
    public $cost_per_conversion_many_per_click;

    /**
     * Original stats container
     */
    private $stats;

    public function __construct($stats) {
        $this->stats = $stats;

        $this->impressions = &$stats->impressions;
        $this->clicks = &$stats->clicks;
        $this->ctr = &$stats->ctr;
        $this->cpc = &$stats->avgCPC;
        $this->cost = &$stats->cost;
        $this->average_position = &$stats->avgPosition;

        $this->conversion_rate = &$stats->convRate1PerClick;
        $this->conversions = &$stats->conv1PerClick;
        $this->cost_per_conversion = &$stats->costConv1PerClick;
        $this->view_through_conversion = &$stats->viewThroughConv;

        $this->conversion_rate_many_per_click = &$stats->convRateManyPerClick;
        $this->conversions_many_per_click = &$stats->convManyPerClick;
        $this->cost_per_conversion_many_per_click = &$stats->costConvManyPerClick;
    }

} 
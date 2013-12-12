<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/12/13
 * Time: 16:38
 */

namespace ebussola\ads\reports\adwords\statsreport;


use ebussola\ads\reports\adwords\MathHelper;
use ebussola\ads\reports\adwords\stats\AbstractStats;
use ebussola\ads\reports\Stats;

class StatsReport implements \ebussola\ads\reports\adwords\StatsReport {

    /**
     * @var \ebussola\ads\reports\StatsReport
     */
    private $stats_report;

    public $average_position;
    public $conversion_rate;
    public $conversions;
    public $cost_per_conversion;
    public $view_through_conversion;
    public $conversion_rate_many_per_click;
    public $conversions_many_per_click;
    public $cost_per_conversion_many_per_click;

    public function __construct(\ebussola\ads\reports\StatsReport $stats_report) {
        $this->stats_report = $stats_report;
    }

    /**
     * @param StatsReport $stats
     */
    public function merge(Stats $stats) {
        $this->stats_report->merge($stats);

        $this->calcValues($stats);
        $this->refreshValues();
    }

    /**
     * refresh calculable values (like ctr and cpc) with the actual values
     */
    public function refreshValues() {
        $statses = $this->stats;
        $this->stats = array();

        foreach ($statses as $stats) {
            $this->addStats($stats);
        }

        $this->stats_report->refreshValues();

        $this->average_position = $this->getAveragePositionSum() / count($this->stats);
        $this->conversion_rate = MathHelper::calcConvRate($this->conversions, $this->clicks);
        $this->conversion_rate_many_per_click = MathHelper::calcConvRate($this->conversions_many_per_click, $this->clicks);
    }

    /**
     * @param Stats $stats
     */
    public function addStats(Stats $stats) {
        $this->stats_report->addStats($stats);

        $this->calcValues($stats);
    }

    /**
     * @param \ebussola\ads\reports\adwords\StatsReport $stats
     */
    private function calcValues(Stats $stats) {
        if ($stats->conversions != null) {
            $this->conversions = $this->conversions + $stats->conversions;
        }
        if ($stats->cost_per_conversion != null) {
            $this->cost_per_conversion = $this->cost_per_conversion + $stats->cost_per_conversion;
        }
        if ($stats->conversion_rate != null) {
            $this->conversion_rate = $this->conversion_rate + $stats->conversion_rate;
        }

        if ($stats->conversions_many_per_click != null) {
            $this->conversions_many_per_click = $this->conversions_many_per_click + $stats->conversions_many_per_click;
        }
        if ($stats->conversion_rate_many_per_click != null) {
            $this->conversion_rate_many_per_click = $this->conversion_rate_many_per_click + $stats->conversion_rate_many_per_click;
        }
        if ($stats->cost_per_conversion_many_per_click != null) {
            $this->cost_per_conversion_many_per_click = $this->cost_per_conversion_many_per_click + $stats->cost_per_conversion_many_per_click;
        }

        $this->view_through_conversion = $this->view_through_conversion + $stats->view_through_conversion;
    }

    /**
     * @return bool
     */
    public function isOnePerClick() {
        return ($this->conversions !== null);
    }

    /**
     * @return bool
     */
    public function isManyPerClick() {
        return ($this->conversions_many_per_click !== null);
    }

    /**
     * @return bool
     */
    public function hasConversions() {
        return ($this->isOnePerClick() || $this->isManyPerClick());
    }

    public function &__get($name) {
        return $this->stats_report->{$name};
    }

    public function __set($name, $value) {
        $this->stats_report->{$name} = $value;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current() {
        return $this->stats_report->current();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next() {
        $this->stats_report->next();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key() {
        return $this->stats_report->key();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid() {
        return $this->stats_report->valid();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind() {
        $this->stats_report->rewind();
    }

    /**
     * @return void
     */
    public function purgeStats() {
        $this->stats_report->purgeStats();
    }

    private function getAveragePositionSum() {
        $result = 0;
        /** @var AbstractStats $stats */
        foreach ($this->stats as $stats) {
            $result += $stats->average_position;
        }

        return $result;
    }

}
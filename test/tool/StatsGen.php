<?php
use ebussola\ads\reports\stats\Stats;

/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 05/11/13
 * Time: 12:21
 */

class StatsGen {

    static public function genStats($override=array()) {
        $object_id = rand(0, 1000) . time();
        $name = md5($object_id);
        $time_start = new DateTime('-'.rand(1, 31).' days');
        $time_end = new DateTime('now');
        $clicks = rand(0, 3000);
        $impressions = $clicks * rand(10, 30);
        $cost = $clicks * (rand(10, 120) / 100);

        $conversions = rand(0, 10);
        $conversions_many_per_click = $conversions;
        $view_through_conversion = rand(0, 5);

        extract($override);

        $stats = new Stats();
        $stats->object_id = $object_id;
        $stats->name = $name;
        $stats->time_start = $time_start;
        $stats->time_end = $time_end;
        $stats->clicks = $clicks;
        $stats->impressions = $impressions;
        $stats->cost = $cost;

        $stats = new \ebussola\ads\reports\adwords\stats\AbstractStats($stats);
        $stats->conversions = $conversions;
        $stats->conversions_many_per_click = $conversions_many_per_click;
        $stats->view_through_conversion = $view_through_conversion;

        $stats->refreshValues();

        return $stats;
    }

    static public function genStatsReport() {
        $stats_report = new \ebussola\ads\reports\statsreport\StatsReport();

        $size = rand(50, 200);
        for ($i=0 ; $i<=$size ; $i++) {
            $stats_report->addStats(self::genStats());
        }

        $stats_report = new \ebussola\ads\reports\adwords\statsreport\StatsReport($stats_report);
        $stats_report->refreshValues();

        return $stats_report;
    }

}
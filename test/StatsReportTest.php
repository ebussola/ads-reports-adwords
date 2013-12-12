<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 04/12/13
 * Time: 17:19
 */

class StatsReportTest extends PHPUnit_Framework_TestCase {

    public function testIsOnePerClick() {
        $stats_report = new \ebussola\ads\reports\statsreport\StatsReport();
        for ($i=0 ; $i<=100 ; $i++) {
            $stats = new \stdClass();

            $stats->convRate1PerClick = rand(1, 10);
            $stats->conv1PerClick = rand(1, 50);
            $stats->costConv1PerClick = rand(1, 50);
            $stats->viewThroughConv = rand(1, 50);

            $stats = new \ebussola\ads\reports\adwords\stats\AbstractStats($stats);
            $stats_report->addStats($stats);
        }

        $stats_report = new \ebussola\ads\reports\adwords\statsreport\StatsReport($stats_report);
        $stats_report->refreshValues();
        $this->assertTrue($stats_report->isOnePerClick());
        $this->assertFalse($stats_report->isManyPerClick());
    }

    public function testIsManyPerClick() {
        $stats_report = new \ebussola\ads\reports\statsreport\StatsReport();
        for ($i=0 ; $i<=100 ; $i++) {
            $stats = new \stdClass();

            $stats->convRateManyPerClick = rand(1, 10);
            $stats->convManyPerClick = rand(1, 50);
            $stats->costConvManyPerClick = rand(1, 50);

            $stats = new \ebussola\ads\reports\adwords\stats\AbstractStats($stats);
            $stats_report->addStats($stats);
        }

        $stats_report = new \ebussola\ads\reports\adwords\statsreport\StatsReport($stats_report);
        $stats_report->refreshValues();
        $this->assertFalse($stats_report->isOnePerClick());
        $this->assertTrue($stats_report->isManyPerClick());
    }

    public function testHasConversions_1() {
        $stats_report = new \ebussola\ads\reports\statsreport\StatsReport();
        for ($i=0 ; $i<=100 ; $i++) {
            $stats = new \stdClass();

            $stats = new \ebussola\ads\reports\adwords\stats\AbstractStats($stats);
            $stats_report->addStats($stats);
        }

        $stats_report = new \ebussola\ads\reports\adwords\statsreport\StatsReport($stats_report);
        $stats_report->refreshValues();
        $this->assertFalse($stats_report->hasConversions());
    }

    public function testHasConversions_2() {
        $stats_report = new \ebussola\ads\reports\statsreport\StatsReport();
        for ($i=0 ; $i<=100 ; $i++) {
            $stats = new \stdClass();

            $stats->convRate1PerClick = rand(1, 10);
            $stats->conv1PerClick = rand(1, 50);
            $stats->costConv1PerClick = rand(1, 50);
            $stats->viewThroughConv = rand(1, 50);

            $stats = new \ebussola\ads\reports\adwords\stats\AbstractStats($stats);
            $stats_report->addStats($stats);
        }

        $stats_report = new \ebussola\ads\reports\adwords\statsreport\StatsReport($stats_report);
        $stats_report->refreshValues();
        $this->assertTrue($stats_report->hasConversions());
    }

    public function testHasConversions_3() {
        $stats_report = new \ebussola\ads\reports\statsreport\StatsReport();
        for ($i=0 ; $i<=100 ; $i++) {
            $stats = new \stdClass();

            $stats->convRateManyPerClick = rand(1, 10);
            $stats->convManyPerClick = rand(1, 50);
            $stats->costConvManyPerClick = rand(1, 50);

            $stats = new \ebussola\ads\reports\adwords\stats\AbstractStats($stats);
            $stats_report->addStats($stats);
        }

        $stats_report = new \ebussola\ads\reports\adwords\statsreport\StatsReport($stats_report);
        $stats_report->refreshValues();
        $this->assertTrue($stats_report->hasConversions());
    }

    public function testAveragePosition() {
        $stats_report = new \ebussola\ads\reports\statsreport\StatsReport();
        for ($i=0 ; $i<=100 ; $i++) {
            $stats = new \stdClass();
            $stats->avgPosition = rand(3, 5);

            $stats = new \ebussola\ads\reports\adwords\stats\AbstractStats($stats);
            $stats_report->addStats($stats);
        }

        $stats_report = new \ebussola\ads\reports\adwords\statsreport\StatsReport($stats_report);
        $stats_report->refreshValues();
        $this->assertLessThanOrEqual(5, $stats_report->average_position);
        $this->assertGreaterThanOrEqual(3, $stats_report->average_position);
    }

    public function testPurgeStats() {
        $stats_report = StatsGen::genStatsReport();
        $stats_report->purgeStats();

        $this->assertNull($stats_report->conversions);
        $this->assertNull($stats_report->conversion_rate);
        $this->assertNull($stats_report->cost_per_conversion);
        $this->assertNull($stats_report->conversions_many_per_click);
        $this->assertNull($stats_report->conversion_rate_many_per_click);
        $this->assertNull($stats_report->cost_per_conversion_many_per_click);
        $this->assertNull($stats_report->view_through_conversion);
    }

    public function testRefreshValues() {
        $stats_report = StatsGen::genStatsReport();
        $stats_report2 = clone $stats_report;

        $stats_report->refreshValues();
        $this->assertEquals($stats_report->conversions, $stats_report2->conversions);
        $this->assertEquals($stats_report->conversion_rate, $stats_report2->conversion_rate);
        $this->assertEquals($stats_report->cost_per_conversion, $stats_report2->cost_per_conversion);
        $this->assertEquals($stats_report->conversions_many_per_click, $stats_report2->conversions_many_per_click);
        $this->assertEquals($stats_report->conversion_rate_many_per_click, $stats_report2->conversion_rate_many_per_click);
        $this->assertEquals($stats_report->cost_per_conversion_many_per_click, $stats_report2->cost_per_conversion_many_per_click);
        $this->assertEquals($stats_report->view_through_conversion, $stats_report2->view_through_conversion);
    }

}
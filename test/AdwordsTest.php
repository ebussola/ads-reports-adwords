<?php
use ebussola\adwords\reports\Reports;

/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 15:21
 */

class AdwordsTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \ebussola\ads\reports\adwords\Adwords
     */
    private $adwords;

    /**
     * @var Reports
     */
    private $adwords_reports;

    public function setUp() {
        $config = include 'config.php';

        $client = new \Guzzle\Service\Client();
        $xml_parser = new ebussola\adwords\reports\xmlparser\SimpleXMLElement();
        $auth_token = $config['auth_token'];
        $developer_token = $config['developer_token'];
        $customer_id = $config['customer_id'];
        $this->adwords_reports = new Reports($client, $xml_parser, $auth_token, $developer_token, $customer_id);

        $reports = new \ebussola\ads\reports\Reports();

        $this->adwords = new \ebussola\ads\reports\adwords\Adwords($this->adwords_reports, $reports);
    }

    public function testDefinitions() {
        $config = include 'config.php';

        $date_start = new DateTime('-5 days');
        $date_end = new DateTime();

        $definitions = array();
        $definitions[0] = $this->adwords->makeCampaignDefinition($date_start, $date_end, $config['some_campaigns']);
        $definitions[1] = $this->adwords->makeHourlyCampaignDefinition($date_start, $date_end, $config['some_campaigns']);
        $definitions[2] = $this->adwords->makeDailyCampaignDefinition($date_start, $date_end, $config['some_campaigns']);
        $definitions[3] = $this->adwords->makeMonthlyCampaignDefinition($date_start, $date_end, $config['some_campaigns']);

        $definitions[4] = $this->adwords->makeAdGroupsDefinition($date_start, $date_end, null, $config['some_adgroups']);
        $definitions[5] = $this->adwords->makeAdsDefinition($date_start, $date_end, null, null, $config['some_ads']);
        $definitions[6] = $this->adwords->makeKeywordDefinition($date_start, $date_end, null, $config['some_adgroups']);
        $definitions[7] = $this->adwords->makeSitesDefinition($date_start, $date_end, $config['some_campaigns']);

        $reports = $this->adwords_reports->downloadReports($definitions);

        return $reports;
    }

    /**
     * @depends testDefinitions
     */
    public function testAdGroupReports($data) {
        $adgroup_data = $data[4];
        $adgroup_report = $this->adwords->makeAdGroupsReport($adgroup_data);
        $this->assertInstanceOf('\ebussola\ads\reports\Stats', $adgroup_report);
        $this->assertInstanceOf('\ebussola\ads\reports\StatsReport', $adgroup_report);

        /** @var \ebussola\ads\reports\adwords\AdGroupStats $stats */
        foreach ($adgroup_report as $stats) {
            $this->assertInstanceOf('\ebussola\ads\reports\Stats', $stats);
            $this->assertNotNull($stats->campaign_name);
            $this->assertNotNull($stats->campaign_id);
        }
    }

    /**
     * @depends testDefinitions
     */
    public function testAdReports($data) {
        $ad_data = $data[5];
        $ad_report = $this->adwords->makeAdsReport($ad_data);
        $this->assertInstanceOf('\ebussola\ads\reports\Stats', $ad_report);
        $this->assertInstanceOf('\ebussola\ads\reports\StatsReport', $ad_report);

        /** @var \ebussola\ads\reports\adwords\AdStats $stats */
        foreach ($ad_report as $stats) {
            $this->assertInstanceOf('\ebussola\ads\reports\Stats', $stats);
            $this->assertNotNull($stats->description1);
            $this->assertNotNull($stats->description2);
            $this->assertNotNull($stats->destination_url);
            $this->assertNotNull($stats->headline);
            $this->assertNotNull($stats->display_url);
            $this->assertNotNull($stats->campaign_name);
            $this->assertNotNull($stats->campaign_id);
        }
    }

    /**
     * @depends testDefinitions
     */
    public function testCampaignReports($data) {
        $campaign_data = $data[0];
        $campaign_report = $this->adwords->makeCampaignReport($campaign_data);
        $this->assertInstanceOf('\ebussola\ads\reports\Stats', $campaign_report);
        $this->assertInstanceOf('\ebussola\ads\reports\StatsReport', $campaign_report);

        /** @var \ebussola\ads\reports\adwords\CampaignStats $stats */
        foreach ($campaign_report as $stats) {
            $this->assertInstanceOf('\ebussola\ads\reports\Stats', $stats);
            $this->assertNotNull($stats->object_id);
            $this->assertNotNull($stats->name);
        }
    }

}
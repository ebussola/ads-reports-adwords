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
        $definitions[] = $this->adwords->makeCampaignDefinition($date_start, $date_end, $config['some_campaigns']);
        $definitions[] = $this->adwords->makeHourlyCampaignDefinition($date_start, $date_end, $config['some_campaigns']);
        $definitions[] = $this->adwords->makeDailyCampaignDefinition($date_start, $date_end, $config['some_campaigns']);
        $definitions[] = $this->adwords->makeMonthlyCampaignDefinition($date_start, $date_end, $config['some_campaigns']);

        $definitions[] = $this->adwords->makeAdGroupsDefinition($date_start, $date_end, null, $config['some_adgroups']);
        $definitions[] = $this->adwords->makeAdsDefinition($date_start, $date_end, null, null, $config['some_ads']);
        $definitions[] = $this->adwords->makeKeywordDefinition($date_start, $date_end, null, $config['some_adgroups']);
        $definitions[] = $this->adwords->makeSitesDefinition($date_start, $date_end, $config['some_campaigns']);

        $this->adwords_reports->downloadReports($definitions);
    }

}
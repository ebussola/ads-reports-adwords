<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 17:38
 */

namespace ebussola\ads\reports\adwords;


use ebussola\adwords\reports\reportdefinition\ReportDefinition;

class KeywordDefinition extends ReportDefinition implements \ebussola\adwords\reports\ReportDefinition {

    public function __construct($report_definition) {
        parent::__construct($report_definition);

        $this->reportType = 'KEYWORDS_PERFORMANCE_REPORT';

        $this->selector = new \Selector();
        $this->selector->fields = array(
            'Id',
            'CampaignName',
            'CampaignId',
            'AdGroupName',
            'AdGroupId',
            'KeywordText',
            'Impressions',
            'Clicks',
            'Ctr',
            'AverageCpc',
            'Cost',
            'KeywordMatchType',
            'AveragePosition',

            'ConversionRate',
            'Conversions',
            'CostPerConversion',
            'ViewThroughConversions',

            'ConversionRateManyPerClick',
            'ConversionsManyPerClick',
            'CostPerConversionManyPerClick'
        );

        $this->field_types = array(
            'keywordID' => 'string',
            'campaign' => 'string',
            'campaignID' => 'string',
            'adGroup' => 'string',
            'adGroupID' => 'string',
            'keyword' => 'string',
            'impressions' => 'int',
            'clicks' => 'int',
            'ctr' => 'float',
            'avgCPC' => 'micro',
            'cost' => 'micro',
            'matchType' => 'string',
            'avgPosition' => 'float',
            'clickConversionRate' => 'float',
            'convertedClicks' => 'int',
            'costConvertedClick' => 'micro',
            'viewThroughConv' => 'int',
            'convRate' => 'float',
            'conversions' => 'int',
            'costConv' => 'micro'
        );
    }

} 
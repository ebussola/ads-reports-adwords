<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 17:28
 */

namespace ebussola\ads\reports\adwords;


use ebussola\adwords\reports\reportdefinition\ReportDefinition;

class CampaignDefinition extends ReportDefinition implements \ebussola\adwords\reports\ReportDefinition {

    public function __construct($report_definition) {
        parent::__construct($report_definition);

        $this->reportType = 'CAMPAIGN_PERFORMANCE_REPORT';

        $this->selector = new \Selector();
        $this->selector->fields = array(
            'Id',
            'CampaignName',
            'Impressions',
            'Clicks',
            'Ctr',
            'AverageCpc',
            'Cost',
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
            'campaignID' => 'string',
            'campaign' => 'string',
            'impressions' => 'int',
            'clicks' => 'int',
            'ctr' => 'float',
            'avgCPC' => 'micro',
            'cost' => 'micro',
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
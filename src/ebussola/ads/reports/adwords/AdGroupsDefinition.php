<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 14:41
 */

namespace ebussola\ads\reports\adwords;

use ebussola\adwords\reports\reportdefinition\ReportDefinition;

class AdGroupsDefinition extends ReportDefinition implements \ebussola\adwords\reports\ReportDefinition {

    public function __construct($report_definition) {
        parent::__construct($report_definition);

        $this->reportType = 'ADGROUP_PERFORMANCE_REPORT';
        $this->selector = new \Selector();
        $this->selector->fields = array(
            'Id',
            'CampaignName',
            'CampaignId',
            'Name',
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
            'adGroupID' => 'string',
            'campaign' => 'string',
            'campaignID' => 'string',
            'adGroup' => 'string',
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
<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 18:11
 */

namespace ebussola\ads\reports\adwords;


use ebussola\adwords\reports\reportdefinition\ReportDefinition;

class SitesDefinition extends ReportDefinition implements \ebussola\adwords\reports\ReportDefinition {

    public function __construct($report_definition) {
        parent::__construct($report_definition);

        $this->reportType = 'PLACEMENT_PERFORMANCE_REPORT';

        $this->selector = new \Selector();
        $this->selector->fields = array(
            'Id',
            'DisplayName',
            'CampaignName',
            'CampaignId',
            'AdGroupName',
            'AdGroupId',
            'PlacementUrl',
            'Impressions',
            'Clicks',
            'Ctr',
            'AverageCpc',
            'Cost',

            'ConversionRate',
            'Conversions',
            'CostPerConversion',
            'ViewThroughConversions',

            'ConversionRateManyPerClick',
            'ConversionsManyPerClick',
            'CostPerConversionManyPerClick'
        );

        $this->field_types = array(
            'criterionID' => 'string',
            'criteriaDisplayName' => 'string',
            'campaign' => 'string',
            'campaignID' => 'string',
            'adGroup' => 'string',
            'adGroupID' => 'string',
            'placement' => 'string',
            'impressions' => 'int',
            'clicks' => 'int',
            'ctr' => 'float',
            'avgCPC' => 'float',
            'cost' => 'float',
            'clickConversionRate' => 'float',
            'convertedClicks' => 'int',
            'costConvertedClick' => 'float',
            'viewThroughConv' => 'int',
            'convRate' => 'float',
            'conversions' => 'int',
            'costConv' => 'float'
        );
    }

} 
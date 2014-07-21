<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 17:19
 */

namespace ebussola\ads\reports\adwords;

use ebussola\adwords\reports\reportdefinition\ReportDefinition;

class AdsDefinition extends ReportDefinition implements \ebussola\adwords\reports\ReportDefinition {

    public function __construct($report_definition) {
        parent::__construct($report_definition);

        $this->reportType = 'AD_PERFORMANCE_REPORT';

        $this->selector = new \Selector();
        $this->selector->fields = array(
            'CampaignName',
            'CampaignId',
            'AdGroupName',
            'Headline',
            'Description1',
            'Description2',
            'Url',
            'Impressions',
            'Clicks',
            'Ctr',
            'AverageCpc',
            'Cost',
            'AveragePosition',
            'DisplayUrl',
            'ImageAdUrl',
            'AdType',

            'ConversionRate',
            'Conversions',
            'CostPerConversion',
            'ViewThroughConversions',

            'ConversionRateManyPerClick',
            'ConversionsManyPerClick',
            'CostPerConversionManyPerClick'
        );

        $this->field_types = array(
            'campaign' => 'string',
            'campaignID' => 'string',
            'adGroup' => 'string',
            'ad' => 'string',
            'descriptionLine1' => 'string',
            'descriptionLine2' => 'string',
            'destinationURL' => 'string',
            'impressions' => 'int',
            'clicks' => 'int',
            'ctr' => 'float',
            'avgCPC' => 'float',
            'cost' => 'float',
            'avgPosition' => 'float',
            'displayURL' => 'string',
            'imageAdURL' => 'string',
            'adType' => 'string',
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
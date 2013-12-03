<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 17:33
 */

namespace ebussola\ads\reports\adwords;


use ebussola\adwords\reports\ReportDefinition;

class MonthlyCampaignDefinition implements ReportDefinition {

    /**
     * @var ReportDefinition
     */
    private $report_definition;

    public function __construct($report_definition) {
        $this->report_definition = $report_definition;

        $this->selector->fields = array_merge($this->selector->fields, array(
            'Month'
        ));
    }

    /**
     * @return array
     */
    public function toArray() {
        return $this->report_definition->toArray();
    }

    public function __set($name, $value) {
        $this->report_definition->{$name} = $value;
    }

    public function __get($name) {
        return $this->report_definition->{$name};
    }

}
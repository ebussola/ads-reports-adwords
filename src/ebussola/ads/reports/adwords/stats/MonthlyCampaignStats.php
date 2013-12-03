<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 16:46
 */

namespace ebussola\ads\reports\adwords\stats;


use ebussola\ads\reports\adwords\CampaignStats as CampaignStatsInterface;

class MonthlyCampaignStats extends CampaignStats implements CampaignStatsInterface {

    public function __construct($stats) {
        parent::__construct($stats);

        $this->time_start = new \DateTime($stats->month);
        $this->time_start->setDate($this->time_start->format('Y'), $this->time_start->format('m'), 1);

        $this->time_end = new \DateTime($stats->month);
        $this->time_end->setDate($this->time_end->format('Y'), $this->time_end->format('m'), $this->time_end->format('t'));
    }

}
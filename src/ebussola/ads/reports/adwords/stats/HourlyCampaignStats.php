<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 16:46
 */

namespace ebussola\ads\reports\adwords\stats;


use ebussola\ads\reports\adwords\CampaignStats as CampaignStatsInterface;

class HourlyCampaignStats extends CampaignStats implements CampaignStatsInterface {

    public function __construct($stats) {
        parent::__construct($stats);

        $this->time_start = new \DateTime();
        $this->time_start->setTime($stats->hourOfDay, 0, 0);

        $this->time_end = new \DateTime();
        $this->time_end->setTime($stats->hourOfDay, 0, 0);
    }

}
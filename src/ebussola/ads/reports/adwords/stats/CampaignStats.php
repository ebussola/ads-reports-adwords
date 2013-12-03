<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 16:24
 */

namespace ebussola\ads\reports\adwords\stats;


class CampaignStats extends AbstractStats implements \ebussola\ads\reports\adwords\CampaignStats {

    public function __construct($stats) {
        parent::__construct($stats);

        $this->object_id = & $stats->campaignID;
        $this->name = & $stats->campaign;
    }

} 
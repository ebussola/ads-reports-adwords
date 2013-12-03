<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 17:42
 */

namespace ebussola\ads\reports\adwords\stats;


class SiteStats extends AbstractStats implements \ebussola\ads\reports\adwords\SiteStats {

    public $campaign_id;
    public $campaign_name;
    public $adgroup_id;
    public $adgroup_name;
    public $placement_url;

    public function __construct($stats) {
        parent::__construct($stats);

        $this->object_id = & $stats->criterionID;
        $this->name = & $stats->criteriaDisplayName;

        $this->campaign_id = & $stats->campaignID;
        $this->campaign_name = & $stats->campaign;
        $this->adgroup_id = & $stats->adGroupID;
        $this->adgroup_name = & $stats->adGroup;
        $this->placement_url = & $stats->placement;
    }

} 
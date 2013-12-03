<?php
/**
 * Created by PhpStorm.
 * User: marilanaro
 * Date: 11/28/13
 * Time: 10:34 AM
 */

namespace ebussola\ads\reports\adwords\stats;

class AdGroupStats extends AbstractStats implements \ebussola\ads\reports\adwords\AdGroupStats {

    /**
     * @var int
     */
    public $campaign_id;

    /**
     * @var string
     */
    public $campaign_name;

    public function __construct($stats) {
        parent::__construct($stats);

        $this->object_id = & $stats->adGroupID;
        $this->name = & $stats->adGroup;

        $this->campaign_id = & $stats->campaignID;
        $this->campaign_name = & $stats->campaign;
    }

}
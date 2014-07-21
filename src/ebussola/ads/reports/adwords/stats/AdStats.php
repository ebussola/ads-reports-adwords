<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 14:33
 */

namespace ebussola\ads\reports\adwords\stats;


class AdStats extends AbstractStats implements \ebussola\ads\reports\adwords\AdStats {

    public $ad_group_name;
    public $campaign_name;
    public $campaign_id;
    public $destination_url;
    public $description1;
    public $description2;
    public $display_url;
    public $headline;
    public $image_url;
    public $ad_type;

    public function __construct($stats) {
        parent::__construct($stats);

        $this->object_id = & $stats->adID;
        $this->name = & $stats->ad;

        $this->campaign_id = & $stats->campaignID;
        $this->campaign_name = & $stats->campaign;
        $this->ad_group_name = & $stats->adGroup;
        $this->destination_url = & $stats->destinationURL;
        $this->description1 = & $stats->descriptionLine1;
        $this->description2 = & $stats->descriptionLine2;
        $this->display_url = & $stats->displayURL;
        $this->headline = & $stats->ad;
        $this->image_url = & $stats->imageAdURL;
        $this->ad_type = & $stats->adType;
    }

}
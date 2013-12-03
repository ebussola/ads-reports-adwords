<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 03/12/13
 * Time: 17:27
 */

namespace ebussola\ads\reports\adwords\stats;


class KeywordStats extends AbstractStats implements \ebussola\ads\reports\adwords\KeywordStats {

    public $campaign_id;
    public $campaign_name;
    public $adgroup_id;
    public $adgroup_name;
    public $text;
    public $keyword_match_type;

    public function __construct($stats) {
        parent::__construct($stats);

        $this->campaign_id = & $stats->campaignID;
        $this->campaign_name = & $stats->campaign;
        $this->adgroup_id = & $stats->adGroupID;
        $this->adgroup_name = & $stats->adGroup;
        $this->text = & $stats->keyword;
        $this->keyword_match_type = & $stats->matchType;
    }

} 
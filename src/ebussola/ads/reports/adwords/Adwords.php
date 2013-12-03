<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 25/11/13
 * Time: 14:35
 */

namespace ebussola\ads\reports\adwords;

use ebussola\ads\reports\adwords\stats\AdGroupStats;
use ebussola\ads\reports\Reports;
use ebussola\ads\reports\statsreport\StatsReport;
use ebussola\adwords\reports\ReportDefinition;
use ebussola\adwords\reports\Reports as AdwordsReports;

class Adwords {

    /**
     * @var AdwordsReports
     */
    private $adwords_reports;

    /**
     * @var Reports
     */
    private $reports;

    public function __construct(AdwordsReports $adwords_reports, Reports $reports) {
        $this->adwords_reports = $adwords_reports;
        $this->reports = $reports;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     * @param string[]  $ad_group_ids
     *
     * @return AdGroupsDefinition
     */
    public function makeAdGroupsDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null,
                                           array $ad_group_ids=null) {

        $report_definition = new AdGroupsDefinition(new \ReportDefinition());

        $predicates = array();
        if ($campaign_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('CampaignId', 'IN', $campaign_ids);
        }
        if ($ad_group_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('Id', 'IN', $ad_group_ids);
        }

        $this->adwords_reports
            ->buildReportDefinition('AdGroup Report', $predicates, $date_start, $date_end, $report_definition);

        return $report_definition;
    }

    /**
     * @param array $data
     *
     * @return StatsReport
     */
    public function makeAdGroupsReport(array $data) {
        $stats_report = new StatsReport();
        foreach ($data as $stats) {
            $stats = new AdGroupStats($stats);
            $stats->refreshValues();

            $stats_report->addStats($stats);
        }

        return $stats_report;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     * @param string[]  $ad_group_ids
     * @param string[]  $ad_ids
     *
     * @return AdsDefinition
     */
    public function makeAdsDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null,
                                      array $ad_group_ids=null, array $ad_ids=null) {

        $report_definition = new AdsDefinition(new \ReportDefinition());

        $predicates = array();
        if ($campaign_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('CampaignId', 'IN', $campaign_ids);
        }
        if ($ad_group_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('AdGroupId', 'IN', $ad_group_ids);
        }
        if ($ad_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('Id', 'IN', $ad_ids);
        }

        $this->adwords_reports
            ->buildReportDefinition('Ad Report', $predicates, $date_start, $date_end, $report_definition);

        return $report_definition;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     *
     * @return CampaignDefinition
     */
    public function makeCampaignDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null) {
        $report_definition = new CampaignDefinition(new \ReportDefinition());

        $predicates = array();
        if ($campaign_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('CampaignId', 'IN', $campaign_ids);
        }

        $this->adwords_reports
            ->buildReportDefinition('Campaign Report', $predicates, $date_start, $date_end, $report_definition);

        return $report_definition;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     *
     * @return CampaignDefinition
     */
    public function makeDailyCampaignDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null) {
        $report_definition = $this->makeCampaignDefinition($date_start, $date_end, $campaign_ids);
        $report_definition = new DailyCampaignDefinition($report_definition);

        return $report_definition;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     *
     * @return CampaignDefinition
     */
    public function makeMonthlyCampaignDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null) {
        $report_definition = $this->makeCampaignDefinition($date_start, $date_end, $campaign_ids);
        $report_definition = new MonthlyCampaignDefinition($report_definition);

        return $report_definition;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     *
     * @return CampaignDefinition
     */
    public function makeHourlyCampaignDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null) {
        $report_definition = $this->makeCampaignDefinition($date_start, $date_end, $campaign_ids);
        $report_definition = new HourlyCampaignDefinition($report_definition);

        return $report_definition;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     * @param string[]  $ad_group_ids
     *
     * @return KeywordDefinition
     */
    public function makeKeywordDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null,
                                          array $ad_group_ids=null) {

        $report_definition = new KeywordDefinition(new \ReportDefinition());

        $predicates = array();
        if ($campaign_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('CampaignId', 'IN', $campaign_ids);
        }
        if ($ad_group_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('AdGroupId', 'IN', $ad_group_ids);
        }

        $this->adwords_reports
            ->buildReportDefinition('Keyword Report', $predicates, $date_start, $date_end, $report_definition);

        return $report_definition;
    }

    /**
     * @param \DateTime $date_start
     * @param \DateTime $date_end
     * @param string[]  $campaign_ids
     * @param string[]  $ad_group_ids
     *
     * @return SitesDefinition
     */
    public function makeSitesDefinition(\DateTime $date_start, \DateTime $date_end, array $campaign_ids=null,
                                          array $ad_group_ids=null) {

        $report_definition = new SitesDefinition(new \ReportDefinition());

        $predicates = array();
        if ($campaign_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('CampaignId', 'IN', $campaign_ids);
        }
        if ($ad_group_ids != null) {
            $predicates[] = $this->adwords_reports->makePredicate('AdGroupId', 'IN', $ad_group_ids);
        }

        $this->adwords_reports
            ->buildReportDefinition('Sites Report', $predicates, $date_start, $date_end, $report_definition);

        return $report_definition;
    }

}
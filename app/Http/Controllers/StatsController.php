<?php

namespace App\Http\Controllers;

use App\Services\GeneralService;
use App\Services\StatsService;

class StatsController extends Controller
{
    private $general;

    private $stats;

    private $logs;

    public function __construct(GeneralService $general, StatsService $stats)
    {
        $this->general = $general;
        $this->stats = $stats;
    }

    public function index()
    {
        $this->general->setTitle('İstatistikler');
        $this->general->getUser();
        $this->stats->getYearStats();
        $this->stats->getTypeStats();
        $this->stats->getLanguageStats();
        $this->stats->getTagStats();
        $this->stats->returnStatsView();
    }
}

<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Article;

class StatsService
{
    public function returnStatsView()
    {
        return response()->view('stats.index')->throwResponse();
    }

    public function getYearStats()
    {
        $return = [];
        $articles = Article::select('publication_year')->get();
        foreach ($articles as $v) {
            if (! isset($return[$v->publication_year])) {
                $return[$v->publication_year] = 0;
            }
            $return[$v->publication_year]++;
        }
        view()->share('year', $return);

        return $return;
    }

    public function getTypeStats()
    {
        $return = [];
        $articles = Article::select('type')->get();
        foreach ($articles as $v) {
            if (! isset($return[$v->type])) {
                $return[$v->type] = 0;
            }
            $return[$v->type]++;
        }
        view()->share('type', $return);

        return $return;
    }

    public function getLanguageStats()
    {
        $return = [];
        $articles = Article::select('language_id')->with('language')->get();
        foreach ($articles as $v) {
            if (! isset($return[$v->language->text])) {
                $return[$v->language->text] = 0;
            }
            $return[$v->language->text]++;
        }
        view()->share('language', $return);

        return $return;
    }

    public function getTagStats()
    {
        $articles = Tag::all();
        view()->share('tag', $articles);

        return $articles;
    }
}

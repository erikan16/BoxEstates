<?php

namespace App\Http\Controllers;

use App\Article;
use App\Property;

class PagesController extends Controller {

    public function getIndex() {

        return view('pages.welcome');

    }

    public function getBuy() {
        $properties = Property::orderBy('created_at')->get();
        return view('pages.buy')->withProperties($properties);
    }

    public function getSell() {
        return view('pages.sell');
    }

    public function getAgent() {
        return view('pages.agent');
    }

    public function getArticle() {
        $articles = Article::orderBy('created_at')->get();
        return view('pages.article')->withArticles($articles);
    }

}
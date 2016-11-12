<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ArticleSingleController extends Controller
{
    public function getIndex(){
        $article = Article::paginate(10);

        return view('pages.article')->withArticle($article);
    }

    public function getSingle($slug){

        $user = Auth::user();
        $logginIn = null !== $user;

        $article = Article::where('slug', '=', $slug)->first();

        return view ('article.single', [

            'user' => Auth::user(),
            'loggedIn' => $logginIn

        ])->withArticle($article);
    }
}

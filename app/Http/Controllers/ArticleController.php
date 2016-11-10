<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Article;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Only agents can access dashboard
        if (Auth::user()->user_type == 'buyer/seller') {
            Redirect::to('/')->send();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        $articles = Article::where('user_id', $user->id)->get();

        return view('article.index', [
            'user' => Auth::user()
        ])->withArticles($articles);//->withAuthors($author);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $this->validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required|alpha_dash|min:5|max:40|unique:articles,slug'
        ));

        $article = new Article;

        $article->title = $request->title;
        $article->description = $request->description;
        $article->slug = $request->slug;
        $article->user_id = Auth::user()->id;

        $article->save();

        Session::flash('success', 'Article was saved successfully!');

        return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('article.show', [
            'user' => Auth::user()
        ])->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('article.edit', [
            'user' => Auth::user()
        ])->withArticle($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $article = Article::find($id);


        if ($request->input('slug') == $article->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'description' => 'required',
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:40|unique:articles,slug',
                'description' => 'required'
            ));
        }

        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->slug = $request->input('slug');
        $article->user_id = Auth::user()->id;

        $article->save();

        Session::flash('success', 'This article was successfully updated!');

        //redirect
        return redirect()->route('article.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        Session::flash('success', 'This article was successfully deleted!');

        return redirect()->route('article.index');
    }
}

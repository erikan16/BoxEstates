<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Comment;
use App\Article;


class DashboardController extends Controller {

    public function __construct()
    {

        $this->middleware('auth');

        // Only agents can access dashboard
        if (Auth::user()->user_type == 'buyer/seller') {

            Redirect::to('/')->send();

        }

    }

    public function getIndex() {

        /** @var \App\User $user */
        $user = Auth::user();

        $todos = Todo::where('user_id', '=', $user->getAttribute('id'))->paginate(5);

        $comments = $user->getDashboardComments($user->id);

        return view('dashboard.dashboard', [

            'user' => $user,
//            'comments' => $comments

        ])->withTodos($todos)->withComments($comments);

    }

}
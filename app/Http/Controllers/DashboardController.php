<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        /** @var User $user */
        $user = Auth::user();

        $todos = ToDo::where('user_id', '=', $user->getAttribute('id'))->paginate(5);

        return view('dashboard.dashboard', [

            'user' => $user

        ])->withTodos($todos);

    }

}
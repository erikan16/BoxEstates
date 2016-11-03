<?php

namespace App\Http\Controllers;


use App\ToDo;

class DashboardController extends Controller {

    public function getIndex() {
        $todos =  Todo::paginate(5);
        return view('dashboard.dashboard')->withTodos($todos);
    }

}
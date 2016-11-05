<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Todo;





class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
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
            'description' => 'required|max:50',
            'estimateTime' => 'required|max:20',
            'estimateValue' => 'required'

        ));

        $todo = new Todo();

        $todo->description = $request->description;
        $todo->estimateTime = $request->estimateTime;
        $todo->estimateValue = $request->estimateValue;
        $todo->user_id = $user->getAttribute('id');

        $todo->save();

        Session::flash('success', 'A new To Do item was saved successfully!');

        return Redirect::to('/dashboard');
//        return redirect()->action('DashboardController@getIndex()');
//        return view('dashboard.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit')->withTodo($todo);
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
        $this->validate($request, array(
            'description' => 'required|max:50',
            'estimateTime' => 'required|max:20',
            'estimateValue' => 'required'
        ));

        $todo = Todo::find($id);

        $todo->description = $request->input('description');
        $todo->estimateTime = $request->input('estimateTime');
        $todo->estimateValue = $request->input('estimateValue');

        $todo->save();

        Session::flash('success', 'This To Do item was successfully updated!');

        //redirect
//        return redirect()->route('article.show', $article->id);
        return Redirect::to('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        Session::flash('success', 'To Do item was successfully deleted!');

        return Redirect::to('/dashboard');
    }
}

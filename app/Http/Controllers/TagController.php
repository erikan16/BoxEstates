<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Tag;

class TagController extends Controller
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
        $tags = Tag::where('user_id', $user->id)->get();

        return view('tags.index', [
            'user' => Auth::user()
        ])->withTags($tags);
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
            'name' => 'required|min:5|max:20'
        ));

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->user_id = $user->getAttribute('id');
        $tag->save();

        Session::flash('success', 'Tag was saved successfully!');

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->delete();

        Session::flash('success', 'Tag was successfully deleted!');

        return redirect()->route('tags.index');
    }
}

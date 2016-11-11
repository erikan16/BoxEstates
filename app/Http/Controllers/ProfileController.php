<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Profile;
use App\Property;
use App\Article;



class ProfileController extends Controller
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
        $profile = Profile::where('user_id', $user->id)->get();
        $article = Article::where('user_id', $user->id)->get();
        $property = Property::where('user_id', $user->id)->get();


        return view('profile.index', [
            'user' => Auth::user()
        ])->withProfiles($profile)->withArticle($article)->withProperty($property);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create', [
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
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required',
            'company_name' => 'required',
            'company_url' => 'required',
            'city' => 'required',
            'state' => 'required',
            'experience' => 'required'
        ));

        $profile = new Profile;

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->company_name = $request->company_name;
        $profile->company_url = $request->company_url;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->experience = $request->experience;
        $profile->user_id = Auth::user()->id;

        $profile->save();

        Session::flash('success', 'Profile was saved successfully!');

        return view('profile.index', [
            'user' => Auth::user()
        ]);
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
        $profile = Profile::find($id);

        return view('profile.edit', [
            'user' => Auth::user()
        ])->withProfile($profile);
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
            'name' => 'required|max:255',
            'email' => 'required',
            'company_name' => 'required',
            'company_url' => 'required',
            'city' => 'required',
            'state' => 'required',
            'experience' => 'required'
        ));

        $profile = Profile::find($id);

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->company_name = $request->company_name;
        $profile->company_url = $request->company_url;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->experience = $request->experience;
        $profile->user_id = Auth::user()->id;

        $profile->save();

        Session::flash('success', 'Profile was updated successfully!');

        return redirect()->route('profile.index', $profile->id);
//        return view('profile.index', [
//            'user' => Auth::user()
//        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}

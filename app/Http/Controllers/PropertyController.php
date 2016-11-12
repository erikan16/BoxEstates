<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Requests;
use App\Property;
use App\Profile;


class PropertyController extends Controller
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
        $properties = Property::where('user_id', $user->id)->get();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('property.index', [

            'user' => Auth::user(),
            'profile' => $profile

        ])->withProperties($properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('property.create', [

            'user' => Auth::user(),
            'profile' => $profile

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
            'title' => 'required|max:255',
            'address' => 'required|max:255',
            'state' => 'required|max:255',
            'zipcode' => 'required|max:11',
            'beds' => 'required|max:2',
            'baths' => 'required|max:2',
            'feet' => 'required|max:5',
            'price' => 'required|max:255',
            'description' => 'required',
            'homeType' => 'required',
            'listingType' => 'required'

        ));

        $property = new Property;

        $property->title = $request->title;
        $property->address = $request->address;
        $property->state = $request->state;
        $property->zipcode = $request->zipcode;
        $property->beds = $request->beds;
        $property->baths = $request->baths;
        $property->feet = $request->feet;
        $property->price = $request->price;
        $property->description = $request->description;
        $property->homeType = $request->homeType;
        $property->listingType = $request->listingType;
        $property->user_id = Auth::user()->id;
        $property->save();

        Session::flash('success', 'Property was saved successfully!');

        return redirect()->route('property.show', $property->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        return view('property.show', [

            'user' => Auth::user()

        ])->withProperty($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);

        return view('property.edit', [

            'user' => Auth::user()

        ])->withProperty($property);
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
            'title' => 'required|max:255',
            'address' => 'required|max:255',
            'state' => 'required|max:255',
            'zipcode' => 'required|max:11',
            'beds' => 'required|max:2',
            'baths' => 'required|max:2',
            'feet' => 'required|max:5',
            'price' => 'required|max:255',
            'description' => 'required',
            'homeType' => 'required',
            'listingType' => 'required'
        ));

        $property = Property::find($id);

        $property->title = $request->input('title');
        $property->address = $request->input('address');
        $property->state = $request->input('state');
        $property->zipcode = $request->input('zipcode');
        $property->beds = $request->input('beds');
        $property->baths = $request->input('baths');
        $property->feet = $request->input('feet');
        $property->price = $request->input('price');
        $property->description = $request->input('description');
        $property->homeType = $request->input('homeType');
        $property->listingType = $request->input('listingType');
        $property->user_id = Auth::user()->id;
        $property->save();

        Session::flash('success', 'This property was successfully updated!');

        //redirect
        return redirect()->route('property.show', $property->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();

        Session::flash('success', 'This property was successfully deleted!');

        return redirect()->route('property.index');
    }
}

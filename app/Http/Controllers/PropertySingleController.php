<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Profile;

class PropertySingleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getSingle($id){

        $property = Property::where('id', '=', $id)->first();


        return view ('property.single')->withProperty($property);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use Mail;
use Session;

class AgentSingleController extends Controller
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

        $agent = Profile::where('id', '=', $id)->first();
        $email = $agent->email;

        return view ('profile.single')->withAgent($agent);
    }

    public function contactAgent(Request $request, $id) {

        $agent = Profile::where('id', '=', $id)->first();

        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $data = array(
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.agent', $data, function($message) use ($data, $agent) {
            $message->from($data['email']);
            $message->to($agent->email);
            $message->subject('BoxEstates Client Contact');
        });

        Session::flash('successMail', 'Your Email was Sent!');

        return redirect('pages/'. $agent->id);
    }
}

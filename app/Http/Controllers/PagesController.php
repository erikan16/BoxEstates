<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Platforms\Keywords\ReservedKeywordsValidator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Property;
use App\Profile;
use Mail;
use Session;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller {

    public function getIndex() {

        return view('pages.welcome');

    }

    public function getBuy() {
        $properties = Property::orderBy('created_at')->get();
        return view('pages.buy')->withProperties($properties);
    }

    public function getSell() {
        return view('pages.sell');
    }

    public function postSell(Request $request) {

        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'address-2' => 'sometimes',
            'state' => 'required',
            'country' => 'required',
            'email' => 'required|email'

        ]);

        $data = array(
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'address2' => $request->address-2,
            'state' => $request->state,
            'country' => $request->country,
            'email' => $request->email
        );

        Mail::send('emails.sell', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('admin@boxestates.info');
            $message->subject('BoxEstates Learn More');
        });

        Session::flash('successMail', 'Your Email was Sent!');

        return redirect('pages/sell');
    }

    public function getAgent() {
        return view('pages.agent');
    }

    public function getArticle() {
        $articles = Article::orderBy('created_at')->get();
        return view('pages.article',[
//            'profile_image' => Article::with('getAuthorImage')->get()
        ])->withArticles($articles);
    }


}
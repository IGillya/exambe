<?php

namespace App\Http\Controllers;

use App\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactMeController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = ContactMe::create([
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,

        ]);
        Session::flash('success','Thanks for messaging me');
        return redirect('/');
    }


}

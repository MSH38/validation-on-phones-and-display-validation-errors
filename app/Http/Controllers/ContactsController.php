<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phone;
use Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones=phones::all;
        return view('contacts.index',compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'phone' => 'required | numeric | unique:phones | digits:11 | regex:/^01[0-2,5]{1}[0-9]{8}$/'
        ]);
        // $phones=new phone();        
        // $phones->phone = $request->phone;
        // $phones->user_id = Auth::id();
        // $phones->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone=phones::find($id);
        return view('contacts.edit',compact('phone'));
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
        $phone=phones::find($id);
        $phone->phone = $request->phone;
        $phone->user_id = Auth::id();
        $phone->save();
        return redirect()->route('contacts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone=phones::find($id)->delete();
        return redirect()->route('contacts.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prelim;
use DB;

class PrelimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prelim =DB::table('prelims')->join('aircrafts','prelims.aircraft_id','=','aircrafts.id')->get();

    	// return data ke view
    	return view('prelims.index', compact('prelim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('prelims.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_prelim = new \App\Prelim;
        $new_prelim->aircraft_id=$request->get('aircraft');
        $new_prelim->description=$request->get('description');
        $new_prelim->finding=$request->get('finding');
        $new_prelim->seat_position=$request->get('seat_position');
        $new_prelim->action=$request->get('action');
   
        $new_prelim->save();
        return redirect()->route('prelims.create')->with('status', 'Aircraft
        successfully created');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
        
}

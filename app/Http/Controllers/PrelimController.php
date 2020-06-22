<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prelim;
use DB;
use App\Exports\PrelimExport;
use Maatwebsite\Excel\Facades\Excel;

class PrelimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prelim =DB::table('aircrafts')->get();

    	// return data ke view
    	return view('prelims.index',['aircrafts'=>$prelim]);
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
        return redirect()->route('prelims.index')->with('status', 'Aircraft
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
        $aircraft = \App\Aircraft::findOrFail($id);
        $prelim = Prelim::where('aircraft_id',$id)->get(); 
       // $prelims = DB::table('prelims')->where('aircraft_id',$aircraft_id);
        return view('prelims.show', ['prelims' => $prelim,
        'aircrafts'=>$aircraft]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prelim = \App\Prelim::findOrFail($id);
        return view('prelims.edit', ['prelim' => $prelim,]);
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
        $new_prelim = \App\Prelim::findOrFail($id);
        $new_prelim->description=$request->get('description');
        $new_prelim->finding=$request->get('finding');
        $new_prelim->seat_position=$request->get('seat_position');
        $new_prelim->action=$request->get('action');
   
        $new_prelim->save();
        return redirect()->route('prelims.index')->with('status', 'Aircraft
        successfully Edited');
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
    public function laporanExcel($id)
    
{
    $id_pesawat =  \App\Aircraft::findOrFail($id);
    
    return Excel::download(new PrelimExport($id_pesawat), 'prelim.xlsx');
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        
}

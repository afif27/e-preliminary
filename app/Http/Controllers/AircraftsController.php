<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Aircraft;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class AircraftsController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-aircrafts')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses, Silahkah Hubungi Admin/PPC');
            });
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aircraft = \App\Aircraft::paginate(10);
        return view('aircrafts.index', ['aircrafts' => $aircraft,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aircrafts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_aircraft = new \App\Aircraft;
        $new_aircraft->registrasi=$request->get('registrasi');
        $new_aircraft->airlines=$request->get('airlines');
        $new_aircraft->rts_plan=$request->get('rts_plan');
   
        $new_aircraft->save();
        return redirect()->route('aircrafts.index')->with('status', 'Aircraft
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
        $aircraft = \App\Aircraft::findOrFail($id);
        return view('aircrafts.edit', ['aircraft'=>$aircraft]);
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
        $new_aircraft = \App\Aircraft::findOrFail($id);
        $new_aircraft->registrasi = $request->get('registrasi');
        $new_aircraft->airlines = $request->get('airlines');
        $new_aircraft->save();
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
    public function combo(Request $request)
    {
        $aircraft = Aircraft::all();
        
        
        
       return view('prelims.create', compact('aircraft'));
    }
    public function updateStatus(Request $request, $id)
    {
        $new_aircraft = \App\Aircraft::findOrFail($id);
        $new_aircraft->status = $request-> get('status');
        $new_aircraft->save();
        return redirect()->route('prelims.index')->with('status', 'Aircraft
        successfully Edited');
    }
}

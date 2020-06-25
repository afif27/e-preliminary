<?php

namespace App\Exports;

use App\Prelim;
use App\Aircraft;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PrelimExport implements FromView, ShouldAutoSize
{



    public function __construct(int $id)
    {
        $this->id_pesawat = $id;
    }
    
    public function View(): View
    {
    
        $prelim = Prelim::where('aircraft_id',$this->id_pesawat)->get();
        $aircraft = \App\Aircraft::findOrFail($this->id_pesawat);
        return view('prelims.excel',['prelim'=>$prelim, 'aircrafts'=>$aircraft]);

        
    }
}

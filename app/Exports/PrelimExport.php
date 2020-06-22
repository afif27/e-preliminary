<?php

namespace App\Exports;

use App\Prelim;
use App\Aircraft;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PrelimExport implements FromView
{
    public $id_pesawat;

    function __construct($id)
    {
        $this->id_pesawat = $id;
    }
    
    public function view(): view
    {
    
        $prelim = Prelim::where('aircraft_id',$this->id_pesawat)->get(); 

        return view('prelims.excel',['prelim'=>$prelim]);

    }
}

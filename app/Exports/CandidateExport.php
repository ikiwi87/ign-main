<?php

namespace App\Exports;

use App\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class CandidateExport implements FromView
{
    protected $id;
    
    function __construct($id) {
            $this->id = $id;
    }
    public function view(): View
    {
        // $address_code = $id;
        // dd($address_code);
        return view('be.candidates.all_sbd', [
            'students_by_school' => DB::table('list_24')->select('location_code')->groupBy('location_code')->get(),
            'id' => $this->id
        ]);
        // return view('excel.sbd_for_search', [
        //     'students_by_school' => db::table('final_r1')->select('address_code')->groupBy('address_code')->get(),
        // ]);
    }
}

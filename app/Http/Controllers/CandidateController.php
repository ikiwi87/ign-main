<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\School;
use App\Student;
use Excel;
use App\Exports\CandidateExport;

class CandidateController extends Controller
{
    
    public function export_sbd($id)
    {
        // $location = $id;
        $students_by_school = db::table('final_list')->select('location_code')->groupBy('location_code')->get();
            $location_name = db::table('final_list')->where('location_code', $id)->first()->location_name;
            // dd($location_name);
        // dd($students_by_schools);
        // echo " : ddax cos SBD: ".$students."<br>";
        // foreach ($students_by_schools as $student) {
        //     $students = DB::table('students')->where('school_id', $student)->get();
        // }
        
        // $students = DB::table('final_list')->where('address_code', $id)
        // ->orderBy('level', 'asc')->orderBy('name', 'asc')->take(6)->get();
        // dd($students[5]);
        
        return Excel::download(new CandidateExport($id), 'IKMC2021_'.$id.'_'.$location_name.'.xlsx');
        // dd($students);
        
                // dd($counts);
                // $pdf = PDF::loadView('pdf.room', compact('students', 'room', 'level'));
                // return $pdf->download('dt04-level'.$level.'.pdf');
                // return response()->json(['status' => false, 'msg' => 'Không tìm thấy thông tin thí sinh'], 404);
    }
    
    
    public function export_all_sbd($id)
    {
        // $location = $id;
        $students_by_school = db::table('final_list')->select('location_code')->groupBy('location_code')->get();
            $location_name = db::table('final_list')->where('location_code', $id)->first()->location_name;
            // dd($students_by_school);
        // dd($students_by_schools);
        // echo " : ddax cos SBD: ".$students."<br>";
        // foreach ($students_by_schools as $student) {
        //     $students = DB::table('students')->where('school_id', $student)->get();
        // }
        
        // $students = DB::table('final_list')->where('address_code', $id)
        // ->orderBy('level', 'asc')->orderBy('name', 'asc')->take(6)->get();
        // dd($students[5]);
        
        return Excel::download(new CandidateExport($id), 'IKMC2021_30_final.xlsx');
        // dd($students);
        
                // dd($counts);
                // $pdf = PDF::loadView('pdf.room', compact('students', 'room', 'level'));
                // return $pdf->download('dt04-level'.$level.'.pdf');
                // return response()->json(['status' => false, 'msg' => 'Không tìm thấy thông tin thí sinh'], 404);
    }

    public function test_sbd()
    {
        
            $students_by_school = db::table('final_list')->select('address_code')->groupBy('address_code')->get();
            // dd($students_by_school);
            return view('be.candidates.test_sbd', compact('students_by_school'));
    }

    public function export_room($id)
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);
        // $students = DB::table('candidate_number_r2')->get();
        // dd($students);
            // DB::table('candidate_number_r2')->orderBy('id')->chunk(20, function($students)
            // {
            // });
            // $pdf = PDF::loadView('pdf.room', compact('students'));
            // return $pdf->download('imas_room.pdf');
            
        $address = $id; 
        // dd($address);
            
        $students = DB::table('list_sbd')->where('address_code', $address)->orderBy('sbd')->get();
        // dd(($students));
        $room = $students->first()->room;
        $level = $students->first()->level;
        $school = $students->first()->location_name;
        $address_code = $students->first()->address_code;
        $address_name = $students->first()->location_name;
        // dd($school);
        $lv2 = DB::table('list_sbd')->where('address_code', 01)->where('level', 1)->orderBy('sbd')->get();
        // $counts = count($students->where('level', 2));
        //         dd($counts);
        // $room = substr($room, 1,2);
        // dd(count($lv2));
                // $i= 0;
                // $r = 1;
				// $l = 0;
                // $counts =count( $students->where('level', $r));
                // dd($counts);
        $pdf = PDF::loadView('be.candidates.room', compact('students', 'room', 'level', 'school'));
        return $pdf->download($address.'-'.$address_name.'.pdf');
        // return redirect()->route('export_room', $address++);
        // return response()->json(['status' => false, 'msg' => 'Không tìm thấy thông tin thí sinh'], 404);
    }
    
    public function export_candidates(Request $rq)
    {
        $id = $rq->id;
        $student = DB::table('final_list')->find($id);
        // dd($student);
        if ($student) {
            $pdf = PDF::loadView('fe.pdf.card', compact('student'));
            return $pdf->download(''.$student->fullname.' - '.$student->sbd.' - IKMC2022.pdf');
        }
        return response()->json(['status' => false, 'msg' => 'Không tìm thấy thông tin thí sinh'], 404);
    }

    public function export_trainghiem(Request $rq)
    {
        $code = $rq ->code;
        $student = DB::table('students')
        ->where('code',$code)
        ->first();
        // dd($student);
        if ($student) {
            $pdf = PDF::loadView('fe.pdf.cardadmissions', compact('student'))->setPaper('A4', 'Portrait');
            return $pdf->download(''.$student->fullname.' - '.$student->code.'.pdf');
        }
        return response()->json(['status' => false, 'msg' => 'Không tìm thấy thông tin thí sinh'], 404);
    }

    public function card_school($id)
    {
        ini_set('max_execution_time', 20000);
        set_time_limit(20000);
        $students = DB::table('final_list')->where('school_code', $id)->get();
        $school = $students->first()->school_code;
        $school_name = $students->first()->school_name;
        $students_by_school = DB::table('final_list')
        ->groupBy('school_code')
        ->select('school_code')
        ->get();
        // dd(json_encode($students_by_school));
        if ($students) {
            $pdf = PDF::loadView('fe.pdf.card_school', compact('students', 'school_name'));
            return $pdf->download('('.$school.') thẻ dự thi trường '.$school_name.'.pdf');
        }
        return response()->json(['status' => false, 'msg' => 'Không tìm thấy thông tin thí sinh'], 404);
    }
    
    public function room($id)
    {
        // $students = DB::table('candidate_number_r2')->get();
        // dd($students);
            // DB::table('candidate_number_r2')->orderBy('id')->chunk(20, function($students)
            // {
            // });
            // $pdf = PDF::loadView('pdf.room', compact('students'));
            // return $pdf->download('imas_room.pdf');
            
        $students = DB::table('final_list')->where('location_code', $id)->orderBy('sbd')->get();
        $room = $students->first()->room;
        $level = $students->first()->level;
        $school = $students->first()->school_name;
        $room = substr($room, 1,2);
        
        $locations = DB::table('final_list')
        ->groupBy('location_code')
        ->select('location_code')
        ->get();
        // dd(json_encode($locations));
                // $i= 0;
                // $r = 1;
				// $l = 0;
                // $counts =count( $students->where('level', $r));
                // dd($counts);
        $pdf = PDF::loadView('fe.pdf.room', compact('students', 'room', 'level', 'school'));
        return $pdf->download(''.$id.' danh sách phòng thi 20 - '.$school.'.pdf');
        return response()->json(['status' => false, 'msg' => 'Không tìm thấy thông tin thí sinh'], 404);
    }
    
}

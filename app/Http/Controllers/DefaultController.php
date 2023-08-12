<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\School;
use App\Student;
use App\FileUpload;
use Mail;
use App\Mail\VerifyEmail;
use App\Mail\ConfirmRegister;

class DefaultController extends Controller
{
    public function index()
    {
        $provinces = DB::table('province')->orderBy('sort')->get();
        $schools = School::all();
        // dd($provinces);
        return view('fe/pages/register_step_1', compact('provinces', 'schools'));
    }
    public function ajaxGetDistricts(Request $request)
    {
        $province_id = $request->province_id;
        $districts = DB::table('district')->where('provinceid', $province_id)->get();
        if (count($districts)>0) {
            return response()->json(['state'=>true,'districts'=>$districts]);
        }
        return response()->json(['status'=>false]);
    }
    public function ajaxGetDistricts_id($id)
    {
        // $province_id = $request->province_id;
        $districts = DB::table('district')->where('provinceid', $id)->get();
        if (count($districts)>0) {
            return response()->json(['state'=>true,'districts'=>$districts]);
        }
        return response()->json(['status'=>false]);
    }
    public function ajaxGetschools(Request $request)
    {
        $district_id = $request->district_id;
        $schools = School::where('district_id', $district_id)->get();
        if (count($schools)>0) {
            return response()->json(['state'=>true,'schools'=>$schools]);
        }
        return response()->json(['status'=>false]);
    }
    public function verify_email(Request $rq)
    {
        $this->validate($rq, [
            'email' => 'required|email',
        ], [
            'title.required' =>'Please insert title',
            'title.email' =>'Email không đúng định dạng',
        ]);

        $email = $rq->email;
        $count_student = Student::where('email', $email)->first();
        $rq->session()->put('email', $email);
        // dd(isset($count_student));
        if (isset($count_student)) {
            $student = Student::find($count_student->id);
            if ($student->done == 1) {
                return redirect()->back()->with('msg', 'Email đã được đăng ký thành công, vui lòng sử dụng email khác.');
            } else {
                // Mail::to($student->email)->send(new VerifyEmail($student));
                return redirect()->route('get_step_2', $student->id)->with('check', 'Email đã tồn tại trong hệ thống, Vui lòng kiểm tra email để lấy số mẫu phiếu!');
            }
        } else {
            $student = Student::create();
            $student->email = $email;
            $student->verify_code = 'MC'.rand(1111, 9999).str_pad($student->id, 1, '0', STR_PAD_LEFT)."".str_random(4);
            $student->save();
            Mail::to($student->email)->bcc(['kangaroomath3@ieg.vn'])->send(new VerifyEmail($student));
            return redirect()->route('get_step_2', $student->id)->with('check', 'Vui lòng kiểm tra email để lấy số mẫu phiếu!');
            // return redirect('/#register')->with('check', 'Vui lòng kiểm tra email để lấy mã xác thực!');
            // return redirect()->back()->with('msg', 'Vui lòng kiểm tra email để lấy mã xác thực!');
        }
    }

    public function get_step_2($id)
    {
        $student = Student::find($id);
        return view('fe/pages/register_step_2', compact('student'));
    }

    public function step_2(Request $rq)
    {
        // dd($rq->email);
        $code = Student::where('verify_code', $rq->verify_code)->where('email', $rq->email)->first();
        // dd($code);
        if ($code == null) {
            return redirect()->back()->with('wrong', 'Mã mẫu phiếu cấp phát không đúng, vui lòng kiểm tra lại.');
        } else {
            $student = Student::find($code->id);
            $rq->session()->put('email', $student->email);
            // $rq->session()->put('verify_code', $student->verify_code);
            $student->verify = 1;
            $verify_code = $rq->verify_code;
            $rq->session()->put('verify_code', $verify_code);
            $student->save();
            return redirect()->route('get_step_3', $student->id);
            dd($student);
        }
    }

    public function get_step_3($id)
    {
        $student = Student::find($id);
        $provinces = DB::table('province')->orderBy('type')->get();
        $schools = School::all();
        return view('fe/pages/register_step_3', compact('student', 'provinces'));
    }

    public function store_student(Request $rq)
    {
        //dd($rq->giaykhaisinh);
        // dd($rq->email);
        $code = Student::where('verify_code', $rq->verify_code)->where('email', $rq->email)->first();
        // dd($code);
        if ($code == null) {
            return redirect()->route('get_step_2')->with('wrong', 'Vui lòng kiểm tra lại!');
        } else {
            // try {
            //     $giay_khai_sinh_name = $code->verify_code.'giaykhaisinh.'.$rq->file('giaykhaisinh')->extension();
            //     $giay_bao_name = $code->verify_code.'_giaybao.'.$rq->file('giaybao')->extension();

            //     $giaykhaisinh_path = $rq->file('giaykhaisinh')->storeAs('upload/giaykhaisinh', $giay_khai_sinh_name);
            //     $giaybao_path = $rq->file('giaybao')->storeAs('upload/giaybao', $giay_bao_name);
            // } catch (\Exception $eror) {
            //     return redirect()->back()->withInput()->withError('Something went wrong, please try again');
            // }

            $student = Student::find($code->id);

           
                
                $student->combo = $rq->combo;
                $student->fullname = $rq->fullname;
                $student->day = str_pad($rq->day, 2, '0', STR_PAD_LEFT);
                $student->month = str_pad($rq->month, 2, '0', STR_PAD_LEFT);
                $student->year = $rq->year;
                $student->dob = str_pad($rq->day, 2, '0', STR_PAD_LEFT)."/".str_pad($rq->month, 2, '0', STR_PAD_LEFT)."/".str_pad($rq->year, 2, '0', STR_PAD_LEFT);
                $student->gender = $rq->gender;
                $student->dan_toc = $rq->dan_toc;
                $student->noi_sinh = $rq->noi_sinh;
                $student->schools_mau_giao = $rq->schools_mau_giao;
                
                $student->schools_id = $rq->schools_id;
                $student->chuong_trinh = $rq->chuong_trinh;

                $student->name_cha = $rq->name_cha;
                $student->namsinh_cha = $rq->namsinh_cha;
                $student->phone_cha = $rq->phone_cha;
                $student->job_cha = $rq->job_cha;

                $student->name_me = $rq->name_me;
                $student->namsinh_me = $rq->namsinh_me;
                $student->phone_me = $rq->phone_me;
                $student->job_me = $rq->job_me;

                $student->tinh_hk = $rq->tinh_hk;
                $student->quan_hk = $rq->quan_hk;
                $student->phuong_xa_hk = $rq->phuong_xa_hk;
                $student->dc_hk = $rq->dc_hk;

                $student->tinh_tt = $rq->tinh_tt;
                $student->quan_tt = $rq->quan_tt;
                $student->phuong_xa_tt = $rq->phuong_xa_tt;
                $student->dc_tt = $rq->dc_tt;

                $student->name_anh_chi = $rq->name_anh_chi;
                $student->lop_dang_hoc = $rq->lop_dang_hoc;
                $student->done = 1;
                if ($student->schools_id == 'Kiến Hưng') {
                    $student->code = 'MCKH'.rand(111111, 999999);
                } if ($student->schools_id == 'Việt Hưng') {
                    $student->code = 'MCVH'.rand(111111, 999999);
                } else {
                    $student->code = 'MCMD'.rand(111111, 999999);
                }
                $student->campus= $rq->campus;
                $student->program= $rq->program;
                // dd($student);
                $student->save();


            Mail::to($student->email)->bcc(['mui.tran@ieg.vn'])->send(new ConfirmRegister($student));
            return redirect()->route('payment', $student);
        }
    }

    public function payment($id)
    {
        $student = Student::find($id);
        return view('fe/pages/payment', compact('student'));
    }
    public function emailthu()
    {
        return view('mail/thuemail' );
    }

    public function xacnhan($id)
    {
        $student = Student::find($id);
        //return view('mail/confirm_register', compact('student'));
        return view('fe/pdf/cardadmissions', compact('student'));
    }

    public function truong($id)
    {
        $student = Student::find($id);
        return view('mail/payment_confirm', compact('student'));
    }

    public function test_email()
    {
        $student = Student::find(927);
        // dd($student);
        Mail::to("mui.tran@ieg.vn")
        ->bcc(['tanmui3315@gmail.com'])
        ->send(new ConfirmRegister($student));
        // return view('fe/pages/payment', compact('student'));
    }
    public function search()
    {
        return view('fe/pages/search_candidates');
    }
    public function result_candidates(Request $rq)
    {
        $fullname = $rq->fullname;
        $day = $rq->day;
        $month = $rq->month;
        $year = $rq->year;
        $students = DB::table('final_list')
        ->where('fullname', $fullname)
        ->where('day', $day)
        ->where('month', $month)
        ->where('year', $year)
        ->get();
        // dd($students);
        return view('fe/pages/result_candidates', compact('students'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailPaymentJob;
use App\Student;
use App\School;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Mail;
use DB;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirm;
use App\Mail\ConfirmRegister;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $students = Student::where('done', 1)->get();

        return view('be/students/list', compact('students'));
    }

    public function accept_all()
    {
        Student::where('payment', 0 )->update(['payment' => 1]);

        return redirect()->back()->with('msg', 'Đã xác nhận tất cả!');

    }

    public function studentData(Request  $request)
    {
        try {
            $ct = Student::query()
                ->select('chuong_trinh')
                ->distinct()
                ->get();

            $csdk = Student::query()
                ->select('schools_id')
                ->distinct()
                ->get();

            return response()->json([
                'chuong_trinh' => $ct,
                'schools_id' => $csdk
            ]);
        } catch (\Exception $e) {
            // handle error
        }
    }

    public function list_verify()
    {
        $students = Student::where('verify', 1)->get();
        // dd($students);
        return view('be/students/list_verify', compact('students'));
    }


    public function json_students(Request $request)
    {
        $columns = array(
                            0 =>'id',
                            1=> 'ma_dinh_danh',
                            2=> 'code',
                            3 =>'fullname',
                            4=> 'dob',
                            5=> 'gender',
                            6=> 'schools_id',
                            7=> 'email',
                            8=> 'dob',
                            9=> 'gender',
                            10=> 'school_id',
                            11=> 'combo',
                            12=> 'parent_name',
                            13=> 'parent_phone',
                            14=> 'payment',
                            15=> 'send_mail',
                            16=> 'id',
                        );


        $totalData = Student::where('done', 1)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $students = Student::where('done', 1)
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $students =  Student::where('done', 1)->where('id', 'LIKE', "%{$search}%")
                            ->orWhere('first_name', 'LIKE', "%{$search}%")
                            ->orWhere('chuong_trinh', 'LIKE', "%{$search}%")
                            // ->orWhere('email', 'LIKE', "%{$search}%")
                            // ->orWhere('code', 'LIKE', "%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();

            $totalFiltered = Student::where('done', 1)->where('id', 'LIKE', "%{$search}%")
                            ->orWhere('first_name', 'LIKE', "%{$search}%")
                            // ->orWhere('schools_id', 'LIKE', "%{$search}%")
                            // ->orWhere('email', 'LIKE', "%{$search}%")
                            // ->orWhere('code', 'LIKE', "%{$search}%")
                            ->count();
        }

        $data = array();
        if (!empty($students)) {
            foreach ($students as $student) {
                $edit =  route('students_edit', $student->id);
                $destroy =  route('students_destroy', $student->id);
                $send_mail = route('mail_payment', $student->id);
                $destroy_payment = route('destroy_payment', $student->id);

                $nestedData['id'] = $student->id;
                $nestedData['fullname'] = $student->fullname;
                $nestedData['schools_id'] = $student->schools_id;
                $nestedData['chuong_trinh'] = $student->chuong_trinh;
                $nestedData['email'] = $student->email;
                $nestedData['code'] = $student->code;
                $nestedData['dob'] = $student->dob;
                $nestedData['gender'] = $student->gender;
                $nestedData['class'] = $student->class;
                if ($student->combo == 1) {
                    $nestedData['combo'] = 'Combo';
                } else {
                    $nestedData['combo'] = 'Thi';
                }
                if ($student->payment == 1 && $student->deposit == 2) {
                    $nestedData['payment'] = "<p>Đã xác nhận</p><a href='{$destroy_payment}' class='btn btn-danger'>Hủy xác nhận</a> ";
                } else if($student->payment == 1 && $student->deposit != 2) {
                    $nestedData['payment'] = "<p>Kế toán đã xác nhận không thể hủy</p>";
                }else{
                    $nestedData['payment'] = "<p>Chưa xác nhận</p><a href='{$send_mail}' class='btn btn-primary' title='Send Mail' >Duyệt & Gửi email</a>";
                }

                if ($student->payment == 0) {
                    $nestedData['send_mail'] = "Unpaid";
                } elseif ($student->send_mail == 0) {
                    $nestedData['send_mail'] = "<a href='{$send_mail}' class='btn btn-primary' title='Send Mail' >Gửi email</a>";
                } else {
                    $nestedData['send_mail'] = "<p><b>Hoàn thành</b></p>";
                }
                $nestedData['parent_name'] = $student->parent_name;
                $nestedData['parent_phone'] = $student->parent_phone;
                //$nestedData['giay_khai_sinh'] = "<a href='/pdf/$student->giay_khai_sinh' class='btn btn-primary' title='View'>View</a>";
                //$nestedData['giay_bao'] = "<a href='/pdf/$student->giay_bao' class='btn btn-primary' title='View'>View</a>";
                $nestedData['options'] = "&emsp;<a href='{$edit}' title='Edit' ><span class='glyphicon glyphicon-edit'></span></a>";
                $data[] = $nestedData;
            }
        }


        $json_data = array(
                    "draw"            => intval($request->input('draw')),
                    "recordsTotal"    => intval($totalData),
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data
                    );

        echo json_encode($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $provinces = DB::table('province')->orderBy('sort')->get();
        return view('be/students/add', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $rq
     * @return Response
     */
    public function store(Request $rq)
    {
        $students = Student::create();
        $student = Student::find($students->id);
        $student->email = $rq->email;
        $student->verify_code = str_pad($student->id, 4, '0', STR_PAD_LEFT)."".str_random(4);
        $student->verify = 1;
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
        // $get_imgage = $request->file('image');
        // //        $path = 'public/uploads/movie/';
        // if ($get_imgage) {
        //     $get_name_image = $get_imgage->getClientOriginalName(); //hinhanh1.png
        //     $name_image = current(explode('.', $get_name_image));
        //     $new_image = $name_image . rand(0, 9999) . '.' . $get_imgage->getClientOriginalExtension();
        //     $get_imgage->move('upload/giaybao/', $new_image);
        //     $recruitments->image = $new_image;
        // }
        $student->done = 1;
        $student->code = 'MC2024'."".str_pad($student->id, 5, '0', STR_PAD_LEFT);
        $student->save();

        Mail::to($student->email)
        ->bcc(['mui.tran@ieg.vn'])
        ->send(new ConfirmRegister($student));

        return redirect()->back()->with('msg', 'done!');
        // dd($student);
    }

    // public function test_send_email()
    // {
    //     $student = Student::find(64);
    //     // dd($student);
    //     Mail::to('datnt@ieg.vn')
    //     // ->cc(['duong.do@ieg.vn', 'dungntm@ieg.vn', 'tratonia.spicer@ieg.vn', 'james.williams@ieg.vn', 'rivers.moore@ieg.vn', 'peutrus.bornman@ieg.vn', 'trucchi.nguyen@ieg.vn', 'schoolpartner@ieg.vn'])
    //     ->send(new ConfirmRegister($student));
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $provinces = DB::table('province')->orderBy('sort')->get();
        return view('be.students.edit', compact('student', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, $id)
    {
        $this->validate($rq, [

        ], [

        ]);
        $student = Student::find($id);
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

        $student->update_info = Auth::user()->id;
        // dd($student);
        $student->save();
        return redirect()->back()->with('msg', 'Edit Success!');
    }

    public function update_school(Request $rq, $id)
    {
        $this->validate($rq, [

        ], [

        ]);
        $student = Student::find($id);
        $student->school_id = $rq->school_id;
        $student->update_school = Auth::user()->id;
        // dd($student);
        $student->save();
        return redirect()->back()->with('msg', 'Sửa trường thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


    public function mail_payment(Request $rq, $id)
    {
        $this->validate($rq, [

        ], [

        ]);
        $student = Student::find($id);
        $student->payment = 1;
        $student->send_mail = Auth::user()->id;
        // dd($student);
        Mail::to($student->email)
        ->bcc(['mui.tran@ieg.vn'])
        ->send(new PaymentConfirm($student));
        $student->save();
        return redirect()->back()->with('msg', 'Send Email Success!');
    }

    public function destroy_payment(Request $rq, $id)
    {
        $this->validate($rq, [

        ], [

        ]);
        $student = Student::find($id);
        $student->payment = 0;
        $student->send_mail = Auth::user()->id;

        $student->save();
        return redirect()->back()->with('msg', 'Đã hủy xác nhận');
    }

    public function list_paid()
    {
        $students = Student::where('done', 1)->where('payment', 1)->where('send_mail', 0)->get();
        // dd($students);
        return view('be/students/list_paid', compact('students'));
    }

    public function mail_payment_list()
    {
        $students = Student::where('done', 1)->where('payment', 1)->where('send_mail', 0)->get();
        // dd($students);
        foreach ($students as $student) {
            $student->send_mail = Auth::user()->id;
            $student->send_mail_method = 1;
            Mail::to($student->email)->send(new PaymentConfirm($student));
            $student->save();
        }

        return redirect()->back()->with('msg', 'Send mail success!');
    }



    public function school_list()
    {
        $provinces = DB::table('province')->orderBy('sort')->get();
        return view('be/schools/list', compact('provinces'));
    }


    public function json_schools(Request $request)
    {
        $columns = array(
                            0 =>'id',
                            1 =>'district_id',
                            2=> 'name',
                            3=> 'district_id',
                            4=> 'name',
                        );

        $totalData = School::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $schools = School::offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $schools =  School::where('id', 'LIKE', "%{$search}%")
                            ->orWhere('name', 'LIKE', "%{$search}%")
                            ->orWhere('district_id', 'LIKE', "%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();

            $totalFiltered = School::where('id', 'LIKE', "%{$search}%")
                            ->orWhere('name', 'LIKE', "%{$search}%")
                            ->orWhere('district_id', 'LIKE', "%{$search}%")
                            ->count();
        }

        $data = array();
        if (!empty($schools)) {
            foreach ($schools as $school) {
                $show =  route('school_create');
                $edit =  route('school_create');

                $nestedData['id'] = $school->id;
                $nestedData['district'] = $school->district->name;
                if ($school->name == null) {
                    $nestedData['name'] = null;
                } else {
                    $nestedData['name'] = $school->name;
                }
                $nestedData['province'] = $school->district->province->name;
                $nestedData['code'] = $school->district_id.''.$school->id;
                $nestedData['options'] = "&emsp;<a href='{$show}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                        &emsp;<a href='{$edit}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                $data[] = $nestedData;
            }
        }

        $json_data = array(
                    "draw"            => intval($request->input('draw')),
                    "recordsTotal"    => intval($totalData),
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data
                    );

        echo json_encode($json_data);
    }

    public function all_school()
    {
        return view('be/schools/all');
    }

    public function school_create()
    {
        $provinces = DB::table('province')->orderBy('sort')->get();
        return view('be/schools/add', compact('provinces'));
    }
    public function school_store(Request $rq)
    {
        $school = new School();
        $school->name = $rq->school_name;
        $school->district_id = $rq->district_id;
        // dd($school);
        $school->save();
        return redirect()->back()->with('msg', 'Add new school success!');
    }

    public function update_status(Request  $request)
    {
        try {
            $studentIds = $request->get('student_ids');
            $type = $request->get('type');

            if($type == 'huy') {
                Student::query()
                    ->when(count($studentIds) > 0, function($q) use ($studentIds) {
                        $q->whereIn('id', $studentIds);
                    })
                    ->update([
                        'payment' => 0
                    ]);

                return response()->json([
                    'message' => 'ok',
                    'success' => true
                ]);
            } else if ($type == 'xacnhan') {
                $validStudents = Student::query()
                    ->where('payment', 0)
                    ->when(count($studentIds) > 0, function($q) use ($studentIds) {
                        $q->whereIn('id', $studentIds);
                    })
                    ->get();

                SendMailPaymentJob::dispatch($validStudents);

                return response()->json([
                    'message' => 'ok',
                    'success' => true
                ]);
            }

        } catch (\Exception $e) {
            // handle error here
        }
    }

    public function experience(Request $request)
    {
        try {

        } catch(\Exception $e) {

        }
    }
}

<?php

namespace App\Http\Controllers;

use App\c;
use DB;
use App\Dutrainghiem;
use App\Student;
use Illuminate\Http\Request;

class DutrainghiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fe/pages/dutrainghiem');
    }
    public function store_dutrainghiem(Request $rq)
    {
        // dd($rq->email);
        // $code = Student::where('verify_code', $rq->verify_code)->where('email', $rq->email)->first();
        // dd($code);
        //Dutrainghiem::create($rq->all());
        $dutrainghiem = new Dutrainghiem();
        $dutrainghiem->code = random_int(100000, 999999);
        $dutrainghiem->fullname = $rq->fullname;
        $dutrainghiem->day = str_pad($rq->day, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->month = str_pad($rq->month, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->year = $rq->year;
        $dutrainghiem->dob = str_pad($rq->day, 2, '0', STR_PAD_LEFT)."/".str_pad($rq->month, 2, '0', STR_PAD_LEFT)."/".str_pad($rq->year, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->parent_name = $rq->parent_name;
        $dutrainghiem->parent_phone = $rq->parent_phone;
        $dutrainghiem->ngaydu_trainghiem = $rq->ngaydu_trainghiem;
        $dutrainghiem->diadiem_thamgia = $rq->diadiem_thamgia;
        // $dutrainghiem->code = 'MC2023'."".str_pad($student->id, 5, '0', STR_PAD_LEFT);
        //dd($dutrainghiem);
        $dutrainghiem->save();
        //return response(['data' => $dutrainghiem]);
        // Mail::to($dutrainghiem->email)->bcc(['mui.tran@ieg.vn'])->send(new ConfirmRegister($student));
        return view('fe/pages/end_dutrainghiem', compact('dutrainghiem'));
        // if ($code == null) {
        //     return redirect()->route('get_step_2')->with('wrong', 'Vui lòng kiểm tra lại!');
        // } else {
        //     $student = Student::find($code->id);
        //     $student->combo = $rq->combo;
        //     $student->fullname = $rq->fullname;
        //     $student->day = str_pad($rq->day, 2, '0', STR_PAD_LEFT);
        //     $student->month = str_pad($rq->month, 2, '0', STR_PAD_LEFT);
        //     $student->year = $rq->year;
        //     $student->dob = str_pad($rq->day, 2, '0', STR_PAD_LEFT)."/".str_pad($rq->month, 2, '0', STR_PAD_LEFT)."/".str_pad($rq->year, 2, '0', STR_PAD_LEFT);
        //     $student->gender = $rq->gender;
        //     $student->noi_sinh = $rq->noi_sinh;
        //     $student->schools_mau_giao = $rq->schools_mau_giao;
        //     $student->ma_dinh_danh = $rq->ma_dinh_danh;
        //     $student->pass_dinh_danh = $rq->pass_dinh_danh;
        //     $student->done = 1;
        //     $student->code = 'MC2023'."".str_pad($student->id, 5, '0', STR_PAD_LEFT);
        //     // dd($student);
        //     $student->save();
        //     Mail::to($student->email)->bcc(['mui.tran@ieg.vn'])->send(new ConfirmRegister($student));
        //     return redirect()->route('payment', $student);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }

    public function admin_index()
    {
        $students = Student::where('payment_done');
        return view('be/dutrainghiem/list');
    }
    public function admin_create()
    {
        return view('be/dutrainghiem/add');
    }
    public function admin_store(Request $request)
    {
        $dutrainghiem = new Dutrainghiem();
        $dutrainghiem->code = random_int(100000, 999999);
        $dutrainghiem->fullname = $request->fullname;
        $dutrainghiem->day = str_pad($request->day, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->year = $request->year;
        $dutrainghiem->dob = str_pad($request->day, 2, '0', STR_PAD_LEFT)."/".str_pad($request->month, 2, '0', STR_PAD_LEFT)."/".str_pad($request->year, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->parent_name = $request->parent_name;
        $dutrainghiem->parent_phone = $request->parent_phone;
        $dutrainghiem->ngaydu_trainghiem = $request->ngaydu_trainghiem;
        $dutrainghiem->diadiem_thamgia = $request->diadiem_thamgia;

        $dutrainghiem->save();

        return view('be/dutrainghiem/list');
    }
    public function admin_edit($id)
    {
        $dutrainghiem = Dutrainghiem::find($id);

        if ($dutrainghiem == null) {
            abort(404);
        }

        return view('be/dutrainghiem/edit', compact('dutrainghiem'));
    }
    public function admin_update(Request $request, $id)
    {
        $dutrainghiem = Dutrainghiem::find($id);

        if ($dutrainghiem == null) {
            return redirect()->back()->withEror('Something went wrong');
        }

        $dutrainghiem->fullname = $request->fullname;
        $dutrainghiem->day = str_pad($request->day, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->year = $request->year;
        $dutrainghiem->dob = str_pad($request->day, 2, '0', STR_PAD_LEFT)."/".str_pad($request->month, 2, '0', STR_PAD_LEFT)."/".str_pad($request->year, 2, '0', STR_PAD_LEFT);
        $dutrainghiem->parent_name = $request->parent_name;
        $dutrainghiem->parent_phone = $request->parent_phone;
        $dutrainghiem->ngaydu_trainghiem = $request->ngaydu_trainghiem;
        $dutrainghiem->diadiem_thamgia = $request->diadiem_thamgia;

        $dutrainghiem->save();

        return redirect()->back()->with('msg', 'Edit Success!');
    }
    public function admin_destroy($id)
    {
        Dutrainghiem::destroy($id);

        return redirect()->back();
    }
    public function json_list(Request $request)
    {
        $columns = array(
            0 =>'id',
            1 =>'code',
            2=> 'fullname',
            3=> 'day',
            4=> 'month',
            5=> 'year',
            6=> 'dob',
            7=> 'parent_name',
            8=> 'parent_phone',
            9=> 'ngaydu_trainghiem',
            10=> 'diadiem_thamgia',
        );

        $totalData = Dutrainghiem::count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');


        $search = $request->input('search.value');

        $dutrainghiem_list = Dutrainghiem::query()
            ->when(!empty($search), function($query) use ($search) {
              $query
                  ->where('id', 'LIKE', "%{$search}%")
                  ->orWhere('fullname', 'LIKE', "%{$search}%")
                  ->orWhere('parent_name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();


        $dutrainghiem_list = $dutrainghiem_list->map(function($dutrainghiem) {
            $edit =  route('dutrainghiem_admin_edit', $dutrainghiem->id);
            $destroy =  route('dutrainghiem_admin_destroy', $dutrainghiem->id);

            $dutrainghiem->options = "
                    <a href='{$edit}' title='Edit' ><span class='glyphicon glyphicon-edit'></span></a>
                    <a href='{$destroy}' title='Destroy' ><span class='glyphicon glyphicon-list'></span></a>
            ";
            return $dutrainghiem;
        });

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($dutrainghiem_list->count()),
            "data"            => $dutrainghiem_list
        );

        echo json_encode($json_data);
    }
}

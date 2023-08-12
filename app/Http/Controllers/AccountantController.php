<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $students = Student::where('payment', 1)->get();
        return view('be/accountant/list', compact('students'));
    }

    public function index_data(Request  $request)
    {
        $totalData = Student::where('done', 1)->count();

        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);

        $columns = [
            0 => 'id',
            1 => 'verify_code',
            2 => 'code',
            3 => 'fullname',
            4 => 'dob',
            5 => 'gender',
            6 => 'schools_id',
            7 => 'email',
            8 => 'dob',
            9 => 'gender',
            10 => 'schools_id',
            11 => 'combo',
            12 => 'parent_name',
            13 => 'parent_phone',
            14 => 'payment',
            15 => 'send_mail',
            16 => 'id',
        ];

        $order = data_get($columns, $request->input('order.0.column'));
        $dir = $request->input('order.0.dir', 'desc');

        $search1 = $request->input('columns.6.search.value', '');
        $search2 = $request->input('columns.7.search.value', '');

        $students = Student::where('done', 1)->where('payment', 1)
            ->when(!empty($search1), function ($q) use ($search1) {
                $q->where('chuong_trinh', 'LIKE', "%$search1%");
            })
            ->when(!empty($search2), function ($q) use ($search2) {
                $q->where('schools_id', 'LIKE', "%$search2%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();


        $students = $students->map(function ($student) {
            $edit = route('students_edit', $student->id);

            if ($student->combo == 1) {
                $student['combo'] = 'Combo';
            } else {
                $student['combo'] = 'Thi';
            }

            if ($student->combo == 1) {
                $student['payment'] = "<p class='btn btn-info' >Đã xác nhận</p>";
            }
            if ($student->deposit == 2) {
                $student->act_deposit = "
                <div class='d-flex'>
                    <a href='/admin/accountant/list-update?id={$student->id}&type=1' class='btn btn-success btn-sm '>Đặt cọc</a>
                    <a href='/admin/accountant/list-update?id={$student->id}&type=0' class='btn btn-primary btn-sm ml-2'>Không cần đặt cọc</a>
                </div>
            ";
            } else {
                $student->act_deposit = "
                <div class='d-flex'>
                    <a href='/admin/accountant/list-update?id={$student->id}&type=1' class='btn btn-success btn-sm {$this->isDeposit($student)} '>Đặt cọc</a>
                    <a href='/admin/accountant/list-update?id={$student->id}&type=0' class='btn btn-primary btn-sm ml-2 {$this->isNotDeposit($student)}'>Không cần đặt cọc</a>
                </div>
            ";
            }

            $student->options = "&emsp;<a href='{$edit}' title='Edit' ><span class='glyphicon glyphicon-edit'></span></a>";

            return $student;
        });


        return response()->json([
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => intval($totalData),
            'recordsFiltered' => intval($students->count()),
            'data'            => $students
        ]);
    }

    public function isDeposit($student)
    {
        return ($student->deposit) ? 'disabled' : '';
    }

    public function isNotDeposit($student)
    {
        return !($student->deposit) ? 'disabled' : '';
    }

    public function list_update(Request $request)
    {
        try {
            $type = $request->get('type', 1);
            $id = $request->input('id');

            Student::where('id', $id)
                ->update(['deposit' => $type]);

            return redirect()->back();
        } catch (\Exception $e) {
        }
    }

    public function payment_update(Request $request)
    {
        try {
            $type = $request->get('type', 1);
            $id = $request->input('id');
            Student::where('id', $id)
                ->update(['payment_done' => $type]);

            return redirect()->back();
        } catch (\Exception $e) {
        }
    }

    public function deposit()
    {
        $students = Student::where('payment', 1)
            ->where('deposit', 1)
            ->get();
        return view('be/accountant/deposit', compact('students'));
    }

    public function deposit_data(Request  $request)
    {
        $totalData = Student::where('done', 1)->count();

        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);

        $columns = [
            0 => 'id',
            1 => 'verify_code',
            2 => 'code',
            3 => 'fullname',
            4 => 'dob',
            5 => 'gender',
            6 => 'schools_id',
            7 => 'email',
            8 => 'dob',
            9 => 'gender',
            10 => 'schools_id',
            11 => 'combo',
            12 => 'parent_name',
            13 => 'parent_phone',
            14 => 'payment',
            15 => 'payment_done',
            16 => 'send_mail',
            17 => 'id'
        ];

        $order = data_get($columns, $request->input('order.0.column'));
        $dir = $request->input('order.0.dir', 'desc');

        $search1 = $request->input('columns.6.search.value', '');
        $search2 = $request->input('columns.7.search.value', '');

        $students = Student::where('done', 1)
            ->where('deposit', 1)
            ->when(!empty($search1), function ($q) use ($search1) {
                $q->where('chuong_trinh', 'LIKE', "%$search1%");
            })
            ->when(!empty($search2), function ($q) use ($search2) {
                $q->where('schools_id', 'LIKE', "%$search2%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();


        $students = $students->map(function ($student) {
            $edit = route('students_edit', $student->id);

            if ($student->combo == 1) {
                $student['combo'] = 'Combo';
            } else {
                $student['combo'] = 'Thi';
            }

            if ($student->combo == 1) {
                $student['payment'] = "<p class='btn btn-info' >Đã xác nhận</p>";
            }
            if ($student->payment_method == 'Tiền mặt') {
                $student->act_payment = "<select class='act_payment' data-id='{$student->id}'>
                    <option selected value='0'>Tiền mặt</option>
                    <option value='1'>Chuyển khoản</option>
                </select>";
            } else {
                $student->act_payment = "<select class='act_payment' data-id='{$student->id}'>
                    <option value='0'>Tiền mặt</option>
                    <option selected value='1'>Chuyển khoản</option>
                </select>";
            }

            if ($student->payment_done == 2) {

                $student->payment_done = "
            <div class='d-flex'>
            <a href='/admin/accountant/payment-update?id={$student->id}&type=1' class='btn btn-success btn-sm '>Đã TT</a>
            <a href='/admin/accountant/payment-update?id={$student->id}&type=0' class='btn btn-primary btn-sm ml-2'>Chưa TT</a>
        </div>";
            }else if($student->payment_done == 1){
                $student->payment_done = "
                <p>Đã thanh toán</p>
                <div class='d-flex'>
                <a href='/admin/accountant/payment-update?id={$student->id}&type=0' class='btn btn-danger btn-sm ml-2'>Hủy thanh toán</a>
            </div>";
            }else{
                $student->payment_done = "
                <p>Chưa thanh toán</p>
                <div class='d-flex'>
                <a href='/admin/accountant/payment-update?id={$student->id}&type=1' class='btn btn-primary btn-sm ml-2'>Thanh toán</a>
            </div>";
            }

            $student->options = "
                <div class='flex justify-content-center'>
                    <a title='Edit' ><span class='glyphicon glyphicon-pencil'></span></a>
                    <a href='{$edit}' title='Edit' ><span class='glyphicon glyphicon-edit ml-4'></span></a>
                </div>
            ";

            return $student;
        });


        return response()->json([
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => intval($totalData),
            'recordsFiltered' => intval($students->count()),
            'data'            => $students
        ]);
    }

    public function deposit_update(Request  $request)
    {
        try {
            $id = $request->get('id');
            $pm = $request->get('payment_method');

            if ($pm == 1) {
                $paymentMethod = 'Chuyển khoản';
            } else {
                $paymentMethod = 'Tiền mặt';
            }

            $student = Student::where('id', $id)->first();
            $student->payment_method = $paymentMethod;
            $student->save();

            return json_encode([
                'data' => $paymentMethod
            ]);
        } catch (\Exception $e) {
        }
    }

    public function no_deposit()
    {
        $students = Student::where('payment', 1)
            ->where('deposit', 0)
            ->get();

        return view('be/accountant/no_deposit', compact('students'));
    }

    public function no_deposit_data(Request  $request)
    {
        $totalData = Student::where('done', 1)->count();

        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);

        $columns = [
            0 => 'id',
            1 => 'verify_code',
            2 => 'code',
            3 => 'fullname',
            4 => 'dob',
            5 => 'gender',
            6 => 'schools_id',
            7 => 'email',
            8 => 'dob',
            9 => 'gender',
            10 => 'schools_id',
            11 => 'combo',
            12 => 'parent_name',
            13 => 'parent_phone',
            14 => 'payment',
            15 => 'send_mail',
            16 => 'id',
        ];

        $order = data_get($columns, $request->input('order.0.column'));
        $dir = $request->input('order.0.dir', 'desc');

        $search1 = $request->input('columns.6.search.value', '');
        $search2 = $request->input('columns.7.search.value', '');

        $students = Student::where('done', 1)
            ->where('deposit', 0)
            ->when(!empty($search1), function ($q) use ($search1) {
                $q->where('chuong_trinh', 'LIKE', "%$search1%");
            })
            ->when(!empty($search2), function ($q) use ($search2) {
                $q->where('schools_id', 'LIKE', "%$search2%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();


        $students = $students->map(function ($student) {
            $edit = route('students_edit', $student->id);

            if ($student->combo == 1) {
                $student['combo'] = 'Combo';
            } else {
                $student['combo'] = 'Thi';
            }

            if ($student->combo == 1) {
                $student['payment'] = "<p class='btn btn-info' >Đã xác nhận</p>";
            }
            if ($student->payment_method == 'Tiền mặt') {
                $student->act_payment = "<select class='act_payment' data-id='{$student->id}'>
                    <option selected value='0'>Tiền mặt</option>
                    <option value='1'>Chuyển khoản</option>
                </select>";
            } else {
                $student->act_payment = "<select class='act_payment' data-id='{$student->id}'>
                    <option value='0'>Tiền mặt</option>
                    <option selected value='1'>Chuyển khoản</option>
                </select>";
            }

            $student->options = "&emsp;<a href='{$edit}' title='Edit' ><span class='glyphicon glyphicon-edit'></span></a>";

            return $student;
        });


        return response()->json([
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => intval($totalData),
            'recordsFiltered' => intval($students->count()),
            'data'            => $students
        ]);
    }
}

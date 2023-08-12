<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use Illuminate\Http\Request;
use App\Student;
use App\Imports\UpdatePayment;
use App\Imports\SendmailExcel;
use App\Exports\StudentsExport;
use App\Exports\UnPaidExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\SendMailTool;
use Illuminate\Support\Facades\Validator;

class ExcelController extends Controller

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exview()
    {
    $students = Student::where('done', 1)->orderBy('id', 'DESC')->paginate(30);
    return view('be/excel/excel', compact('students'));
    }

    public function update_contestants()
    {
        $conts = Excel::toCollection(new UpdatePayment,request()->file('file'));
        dd($conts[0]);
        $i = 1;
        // $content = "IKMC00013 0976750309 tran xuan ba";
        // $code = substr(strstr( strtoupper($content), 'IKMC0'), 0, 9);
        // dd($code);
        foreach ($conts[0] as $row) {
            if ($row['amount'] == 600000) {
                $amount = 1;
            } elseif($row['amount'] == 350000) {
                $amount = 0;
            }
            $contestants = Student::where('done', 1)->where('code', substr(strstr( strtoupper($row['content']), 'IKMC0'), 0, 9))->where('combo', $amount)->first();
            // dd($contestants);
            if($contestants == Null)
            {
                echo $i." : Phát hiện lỗi: SBD: <b>".substr(strstr( strtoupper($row['content']), 'IKMC0'), 0, 9)."</b> - Với số tiền <b>".$row['amount']."</b> - mã chuyển khoản <b>".$row['number']."</b> - số <b>".$row['number']."</b><br>";
                $i++;
                continue;
            }
            $contestants->payment = 1;
            $contestants->payment_date = $row['date'];
            $contestants->payment_number = $row['number'];
            $contestants->payment_content = $row['content'];
            // $contestants->send_mail = 1;
            $contestants->update();
            // Mail::to("datnt@ieg.vn")->send(new Confirmpayment($contestants));


        }
        // return back()->with('msg','okla');
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function export_provinces()
    {
        return Excel::download(new ProvincesExport, 'Provinces.xlsx');
    }


    public function export_confirmmail()
    {
        return Excel::download(new MailConfirmExport, 'ListMail.xlsx');
    }


    public function sendmailconfirm()
    {
        $conts = Excel::toCollection(new SendMailConfirm,request()->file('file'));
        // dd($conts);
        $i = 1;
        foreach ($conts[0] as $row) {
            $contestants = Contestants::where('sbd', $row['sbd'])->first();
            // dd($contestants);
            if($contestants == Null)
            {
                echo $i." : phát hiện lỗi: SBD: .''.$row[sbd] ";
                $i++;
                continue;
            }
            $contestants->send_mail = 1;
            $contestants->update();

        Mail::to($row['email'])->send(new Confirmpayment($contestants));
        }
        // return back()->with('msg','okla');
    }



    /**
    * @return \Illuminate\Support\Collection
    */
    public function import_provinces()
    {
        Excel::import(new ProvincesImport,request()->file('file'));

        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import_districts()
    {
        Excel::import(new DistrictsImport,request()->file('file'));

        return back()->with('msg','okla');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import_school()
    {
        Excel::import(new SchoolImport,request()->file('file'));
        return back()->with('msg','okla');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function import_payment2()
    // {
    //     Excel::import(new PaymentImport,request()->file('file'));
    //     return back()->with('msg','okla');
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import_contestants()
    {
        $contestants = Excel::toCollection(new ContestantsImport,request()->file('file'));
        $i = 0;
        // dd($contestants[0]);
        foreach ($contestants[0] as $row)
        {
        $cont = Contestants::where('sbd', $row['tranfer_code'])->updateOrCreate(
            [
                'sbd' => $row['tranfer_code']
            ],
            [
                    'sbd' => $row['tranfer_code'],
                    'name' => $row['name'],
                    'fullname' => $row['full_name'],
                    'gender' => $row['gender'],
                    'email' => $row['email'],
                    'dob' => $row['dob'],
                    'grade' => $row['grade'],
                    'class' => $row['class'],
                    'level' => $row['level'],
                    'school_id' => $row['school_id'],
                    // 'parentname' => $row['parentname'],
                    // 'phone_teacher' => $row['phone_teacher'],
                    // 'email_teacher' => $row['email_teacher'],
                    'dad_name' => $row['dad_name'],
                    'dad_email' => $row['dad_mail'],
                    'dad_phone' => $row['dad_phone'],
                    'mom_name' => $row['mom_name'],
                    'mom_email' => $row['mom_email'],
                    'mom_phone' => $row['mom_phone'],
                    'address' => $row['address'],
                    // 'logistic' => $row['logistic'],
                    // 'book' => $row['book'],
                    // 'shirt_size' => $row['shirt_size'],
                    'combo' => $row['register_type'],
                    'day_reg' => $row['register_date'],
                    'amount' => $row['price'],
        ]);
        }
        return back()->with('msg','okla');
    }


    public function contestants_school()
    {
        ini_set('memory_limit', '512M');
        $contestants = Excel::toCollection(new ContestantSchoolImport,request()->file('file'));
        $i = 0;
            try {
                // dd($contestants[0]);
                foreach ($contestants[0] as $row)
                // dd(substr($row['dien_thoai_bo'], -3));
                {
                $cont = Contestants::where('sbd', 'S'.''.str_pad($row['ma_truong'], 5, '0', STR_PAD_LEFT).''.str_random(10))->updateOrCreate(
                    [

                        'sbd' => 'S'.''.str_pad($row['ma_truong'], 5, '0', STR_PAD_LEFT).''.str_random(10),
                    ],
                    [
                            'sbd' =>  'S'.''.str_pad($row['ma_truong'], 5, '0', STR_PAD_LEFT).''.str_random(10),
                            'name' => $row['ten'],
                            'fullname' => str_replace('  ', ' ',$row['ho_va_ten_dem'].' '.$row['ten']),
                            'gender' => $row['gioi_tinh'],
                            'email' => $row['email_gvcn'],
                            'dob' => $row['ngay_sinh'].'/'.$row['thang_sinh'].'/'.$row['nam_sinh'],
                            'day' => $row['ngay_sinh'],
                            'month' => $row['thang_sinh'],
                            'year' => $row['nam_sinh'],
                            'grade' => $row['khoi_lop'],
                            'class' => $row['lop'],
                            'level' => $row['cap_do'],
                            'school_id' => $row['ma_truong'],
                            'combo' => 'school',
                            'amount' => $row['dang_ky_combo_kmc_online_1_nam'],
                            'phone_teacher' => $row['dien_thoai_gvcn'],
                            'email_teacher' => $row['email_gvcn'],
                            'dad_name' => $row['ho_va_ten_bo'],
                            'dad_phone' => $row['dien_thoai_bo'],
                            'dad_email' => $row['email_bo'],
                            'mom_name' => $row['ho_va_ten_me'],
                            'mom_phone' => $row['dien_thoai_me'],
                            'mom_email' => $row['email_me'],
                ]);
            }
                return back()->with('msg','okla');
            } catch (\Exception $ex) {
                return back()->withErrors($ex->getMessage());
            }
    }

    public function update_contestants_school()
    {
        $contestants = Excel::toCollection(new ContestantSchoolImport,request()->file('file'));

        $i = 1;
        foreach ($contestants[0] as $row) {
            $contestants = Contestants::where('sbd',  'SCHOOL'.''.str_pad($row['ma_truong'], 5, '0', STR_PAD_LEFT).''.substr($row['email_bo'], 0, 3).''.substr($row['email_me'], 0, 3))->first();
            // dd($contestants);
            if($contestants == Null)
            {
                echo $i." : phát hiện lỗi: SBD: <br>";
                $i++;
                continue;
            // break;
            }
            $contestants->payment = 1;
            // $contestants->combo = 'school';
            $contestants->send_mail = 2;
            $contestants->update();

        }
        return back()->with('msg','okla');
    }


    /**
    * @return \Illuminate\Support\Collection
    */


    // public function update_contestants()
    // {
    //     $conts = Excel::toCollection(new update_contestants,request()->file('file'));
    //     $arrayName = array('json' => $conts, );
    //     dd($arrayName);
    //     $cont_json = json_encode(Array($conts));
    //     $cont_json = json_decode($cont_json, true);
    //     $jsons = $cont_json[0];
    //     dd($jsons);
    //     $i = 0;
    //     foreach ($cont_json[0] as $json) {
    //         dd($json['status']);
    //         $contestants = Contestants::where('id', $json['id'])->first();
    //         dd($contestants);
    //         if ($contestants == null) {
    //             echo $i." : Không tìm thấy SBD: ".$json['id']."<br>";
    //             $i++;
    //             continue;
    //         }
    //         $contestants->payment = $json['status'];
    //         $contestants->update();
    //     return back()->with('msg','okla');
    //     }
    // }



    public function export_students()
    {
        return Excel::download(new StudentsExport, 'PaidList.xlsx');
    }

    public function import_students(Request $request)
    {
        try {
            Excel::import(new StudentImport(), $request->file('file'));

            return redirect()->back();
        } catch (\Exception $e) {

        }
    }

    public function unpaid_export()
    {
        // $students = Student::where('done', 1)
        // // ->where('payment', 0)
        // ->take(237)
        // ->get();
        // dd($students[236]);
        return Excel::download(new UnPaidExport, 'Unpaid.xlsx');

    }

    public function export_combo()
    {
        return Excel::download(new ComboPaymentExport, 'School_Combo.xlsx');

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function payment()
    // {
    //     Excel::import(new PaymentImport,request()->file('file'));
    //     return back()->with('msg','okla');
    // }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import_payments()
    {
        $payments = Excel::toCollection(new PaymentscodeImport,request()->file('file'));
        $i = 0;
        foreach ($payments[0] as $row) {

        $cont = Paymentscode::where('number', $row['number'])->updateOrInsert(
            [
                'number' => $row['number']
            ],
            [
            'payments_text' => $row['content'],
            'reference' => $row['reference'],
            'payments_id' => substr(strstr( strtoupper($row['content']), 'IKMC0'), 0, 9),
            'amount' => $row['total'],
            'number' => $row['number'],
        ]);


        echo $i." : đã update: SBD: <b>".$row['number']."</b> <br>";
        $i++;
        continue;
            }
        // return back()->with('msg','okla');
    }

    public function export_payments()
    {
        return Excel::download(new PaymentsExport, 'Payment.xlsx');
    }


    public function sendmail()
    {
        // $email = 'datnt@ieg.vn';
        // Mail::to($email)->send(new SendMailTool($email));

        // dd($email);
        ini_set('max_execution_time', 3600);
        $json = file_get_contents('mail.json');
        $json = json_decode($json, true);
        // dd($json);
        $i = 1;
        foreach ($json as $email) {

        try {
            $validator1 = Validator::make($email, [
                'email' => 'email'
            ],
            [
                'name.email' => 'cc',
            ]);
            if ($validator1->fails()) {
                // dd($email);
                echo $i." : fail: ".($email['email'])."<br>";
                $i++;
                continue;
            }
            else {
                Mail::to($email)
                ->cc('kangaroomath3@ieg.vn')
                ->send(new SendMailTool($email));
                echo $i." : done: ".($email['email'])."<br>";
                $i++;
                continue;
            }
        } catch (\Exception $e) {
            echo $i." : fuck: ".($email['email'])."<br>";
            $i++;
            continue;
        }
            }
        // return view('mail.sendmail');
    }

    public function sending_email(request $rq)
    {

        $emails = $rq->email;
        // $emails = ["nhanntt@hvhv.edu.vn", "tuongminhhien@gmail.com", "lien.nth@theolympiaschools.edu.vn", "maithimen.cet@gmail.com", "hongphaninfo@gmail.com", "maianh200881@gmail.com", "dangchungvibex@gmail.com", "lamgiang.bravat@gmail.com", "tieulong155@gmail.com", "trinh@clevergroup.vn"];
        $emails = json_decode($emails);
        // dd($emails);
        // $file = file($rq->file);
        $file = Excel::toArray(new SendmailExcel,request()->file('file'));
        dd($file[0]);
        foreach ($file[0] as $email) {
            dd($email);
            Mail::to($email->email)
            ->cc('datnt@ieg.vn')
            ->send(new SendMailTool($email));
            }


        // foreach($emails as $email){
        //     // dd($email->Email);
        //     Mail::to($email->email)->send(new SendMailTool($email));
        // }
    return redirect()->back()->with('msg','ô kê rồi đấy !!!!');
    }
}

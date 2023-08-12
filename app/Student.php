<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // protected $fillable = [
    //     'name', 'send_mail','day', 'month', 'year', 'day_reg', 'amount', 'username', 'fullname', 'email', 'gender', 'dob', 'grade', 'class', 'level', 'school_id', 'parentname', 'phone', 'address', 'logistic', 'sbd', 'phone_teacher', 'email_teacher',
    //     'dad_name', 'dad_phone', 'dad_email', 'mom_name', 'mom_phone', 'mom_email', 'book', 'shirt_size', 'combo', 'reference', 'number'
    // ];

    public function school()
    {
        return $this->belongsTo('App\School', 'school_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'send_mail', 'id');
    }
}

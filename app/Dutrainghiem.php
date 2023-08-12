<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dutrainghiem extends Model
{
    protected $dutrainghiem = "dutrainghiem";
    public function user()
    {
        return $this->belongsTo('App\User', 'send_mail', 'id');
    }
}

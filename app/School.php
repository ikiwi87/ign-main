<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    public function district()
    {
        return $this->belongsTo('App\District', 'district_id', 'districtid');
    }

    public function province()
    {
        return $this->hasManyThrough('App\Province', 'App\District', 'provinceid', 'provinceid', 'id');
    }
}

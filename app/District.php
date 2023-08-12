<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    
    public function province()
    {
        return $this->belongsTo('App\Province', 'provinceid', 'provinceid');
    }
}

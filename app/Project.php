<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function type()
    {
        return $this->belongsTo('App\Project_type', 'project_type_id', 'id');
    }
    public function project_image()
    {
        return $this->hasMany('App\Image', 'project_id', 'id');
    }
}

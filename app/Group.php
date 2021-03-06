<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = array('id');

    public function users()
  {
    return $this->belongsToMany('App\User');
  }
}

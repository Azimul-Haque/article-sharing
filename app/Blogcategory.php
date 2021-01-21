<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    public function blogs() {
      return $this->hasMany('App\Blog');
    } 
}

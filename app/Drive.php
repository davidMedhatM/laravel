<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
   protected $table = 'drives';
   protected $fillable = ['title','description','file','userid'];

}

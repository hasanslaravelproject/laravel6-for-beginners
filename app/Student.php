<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{ 
    protected $fillable=[ 'first_name','middle_name','last_name','address','date_of_birth','place_of_birth',
     'age','gender','year','status','color','guardian','relation','g_address','contact'];
    }
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{ 
    protected $fillable=[ 'user_name','password','city_of_employment','web_server','role','sign_on'];
    }

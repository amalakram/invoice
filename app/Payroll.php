<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $guarded = [];

   
 

public function employee()
{
return $this->belongsTo('App\employee','Employee_id');
}

public function Overtime()
{
return $this->belongsTo('App\Overtime','Overtime_id');
}
}
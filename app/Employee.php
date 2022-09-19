<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    protected $table ='employees';
    protected $primarykey ='employees';
    public function employee()
{
return $this->belongsTo('App\employee','Employee_id');
}
}

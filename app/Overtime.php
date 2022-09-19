<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $guarded = [];
    public function employee()
{
return $this->belongsTo('App\employee','Employee_id');
}

}

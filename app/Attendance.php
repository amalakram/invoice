<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];
    public function AddText()
    {
        if ($this->attendance == 'Present') {
            $text = 'Present';
        } elseif ($this->attendance == 'Absent') {
            $text ='Absent';
        }

        return $text;
    }
    public function employee()
{
return $this->belongsTo('App\employee','Employee_id');
}
}

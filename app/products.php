<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    
    protected $guarded = [];
    public function quote()
    {
        return $this->belongsTo(Quotation::class, 'quote_id', 'id');
    }


   public function section()
   {
   return $this->belongsTo('App\sections','section_id');
   }


   public function unitText()
    {
        if ($this->unit == 'piece') {
            $text = 'piece';
        } elseif ($this->unit == 'g') {
            $text ='gram';
        } elseif ($this->unit == 'kg') {
            $text ='kilo_gram';
        }elseif ($this->unit == 'm²') {
            $text ='m²';
        }

        return $text;
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    public function details()
    {
        return $this->hasMany(products::class, 'quote_id', 'id');
    }

    

    public function products()
    {
        
        return $this->discount_type == 'fixed' ? $this->discount_value : $this->discount_value.'%';

    }
    public function section()
   {
   return $this->belongsTo('App\sections');
   }
   public function discountResult()
    {
        return $this->discount_type == 'fixed' ? $this->discount_value : $this->discount_value.'%';
    }

}

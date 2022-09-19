<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    public function details()
    {
        return $this->hasMany(products::class, 'invoice_id', 'id');
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

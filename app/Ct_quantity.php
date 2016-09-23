<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_quantity extends Model
{
    protected $table = 'ct_quantities';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['product', 'unit', 'quantity', 'status', 'state'];
    protected $guarded = ['id'];

    /*public function ct_products()
    {
        return $this->hasOne('App\Ct_product', 'id', 'product');
    }*/

    //Ct quantities belongs to a product
    public function ct_products()
    {
        return $this->belongsTo('App\Ct_product', 'product', 'id');
    }



    public function prc_products()
    {
        return $this->hasMany('App\Prc_product', 'quantity', 'id');
    }
}

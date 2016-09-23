<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_product extends Model
{

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'status', 'state'];
    protected $guarded = ['id'];

    public function ct_categories()
    {
        return $this->hasOne('App\Ct_category', 'id', 'id');
    }

    /*public function ct_quantities()
    {
        return $this->hasOne('App\Ct_quantity', 'product', 'id');
    }*/

    //Ct products has many prices
    public function ct_quantities()
    {
        return $this->hasMany('App\Ct_quantity', 'product', 'id');
    }

    public function prc_products()
    {
        return $this->hasMany('App\Prc_product', 'product', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Viveed
use Jenssegers\Date\Date;
use phpDocumentor\Reflection\Types\Null_;

class Prc_product extends Model
{
    protected $table = 'prc_products';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['product', 'quantity', 'catalogue', 'price', 'discount', 'init', 'status', 'state'];
    protected $guarded = ['id'];


    public function ct_quantities()
    {
        return $this->belongsTo('App\Ct_quantity');
    }


    public function ct_products()
    {
        return $this->belongsTo('App\Ct_product', 'product', 'id');
    }


}

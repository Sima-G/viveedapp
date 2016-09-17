<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_quantity extends Model
{
    protected $table = 'ct_quantities';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['product', 'unit', 'quantity', 'status', 'state'];
    protected $guarded = ['id'];

    public function ct_products()
    {
        return $this->hasOne('App\Ct_product', 'id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_product extends Model
{

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'category', 'status', 'state'];
    protected $guarded = ['id'];

    public function ctr_categories()
    {
        return $this->hasOne('App\Ct_category', 'id', 'id');
    }

}

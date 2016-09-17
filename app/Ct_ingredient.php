<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_ingredient extends Model
{
    protected $table = 'ct_ingredients';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['product', 'title', 'description', 'unit', 'quantity', 'status', 'state'];
    protected $guarded = ['id'];
}

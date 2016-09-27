<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_inquantity extends Model
{
    protected $table = 'ct_inquantities';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['ingredient', 'quantity', 'unique', 'status', 'state'];
    protected $guarded = ['id'];
}

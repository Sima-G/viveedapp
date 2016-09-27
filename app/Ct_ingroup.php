<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_ingroup extends Model
{
    protected $table = 'ct_ingroups';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'selection', 'status', 'state', 'product'];
    protected $guarded = ['id'];
}

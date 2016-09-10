<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ct_category extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ct_categories';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'status', 'state'];
    protected $guarded = ['id'];

    public function ct_products()
    {
        return $this->belongsToMany('App\Ct_product', 'id', 'id');
    }
}

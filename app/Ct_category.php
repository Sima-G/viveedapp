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
    protected $fillable = ['title', 'parent', 'description', 'status', 'state'];
    protected $guarded = ['id'];

    public function ct_products()
    {
        return $this->belongsToMany('App\Ct_product', 'id', 'id');
    }







    public function ctr_quantities()
    {
        return $this->belongsToMany('App\Ctr_quantity', 'ctr_quantity_ct_category')->withTimestamps();
    }

    public function ctr_groups()
    {
        return $this->belongsToMany('App\Ctr_group', 'ctr_group_ct_category')->withTimestamps();
    }

    public function ctr_products()
    {
        return $this->belongsToMany('App\Ctr_product', 'id', 'id');
    }
}

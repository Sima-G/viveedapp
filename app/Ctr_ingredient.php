<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ctr_ingredient extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ctr_ingredients';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'selection', 'status', 'state'];
    protected $guarded = ['id'];

    public function ctr_groups()
    {
        return $this->belongsToMany('App\Ctr_group', 'ctr_ingredient_ctr_group')->withTimestamps();
    }

    public function ctr_products()
    {
        return $this->belongsToMany('App\Ctr_product', 'ctr_product_ctr_ingredient')->withPivot('description', 'quantity', 'status', 'state')->withTimestamps();
    }

}

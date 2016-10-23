<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ctr_group extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ctr_groups';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'selection', 'status', 'state'];
    protected $guarded = ['id'];

    public function ct_categories()
    {
        return $this->belongsToMany('App\Ct_category', 'ctr_group_ct_category')->withTimestamps();
    }

    public function ctr_ingredients()
    {
        return $this->belongsToMany('App\Ctr_ingredient', 'ctr_ingredient_ctr_group')->withTimestamps();
    }

}

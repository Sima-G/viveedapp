<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ctr_quantity extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ctr_quantities';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'decimal', 'status', 'state'];
    protected $guarded = ['id'];

    public function ct_categories()
    {
        return $this->belongsToMany('App\Ct_category', 'ctr_quantity_ct_category')->withTimestamps();
    }

}

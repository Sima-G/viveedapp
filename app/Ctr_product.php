<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctr_product extends Model
{

    protected $table = 'ctr_products';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'category', 'status', 'state'];
    protected $guarded = ['id'];

    public function ctr_categories()
    {
        return $this->hasOne('App\Ct_category', 'id', 'category');
    }

    public function ctr_groups()
    {
        return $this->belongsToMany('App\Ctr_group', 'ctr_product_ctr_group')->withPivot('status', 'state')->withTimestamps();
    }

    public function ctr_quantities()
    {
        return $this->belongsToMany('App\Ctr_quantity', 'ctr_product_ctr_quantity')->withPivot('id', 'quantity', 'status', 'state')->withTimestamps();
    }

    // Relationship between Ctr_products and Prc_catalogue table (Many-to-Many)
    public function prc_catalogues()
    {
        return $this->belongsToMany('App\Prc_catalogue', 'prc_products', 'product', 'catalogue')->withPivot('quantity', 'price', 'discount', 'init', 'status', 'state')->withTimestamps();
    }

    public function ctr_ingredients()
    {
        return $this->belongsToMany('App\Ctr_ingredient', 'ctr_product_ctr_ingredient')->withPivot('description', 'quantity', 'status', 'state')->withTimestamps();
    }


    /*public function prc_products()
    {
        return $this->hasManyThrough(
            'App\Prc_product', 'App\Ctr_quantity',
            'product', 'quantity', 'id'
        );
    }*/
}

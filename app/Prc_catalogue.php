<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Viveed
use Jenssegers\Date\Date;
use phpDocumentor\Reflection\Types\Null_;

class Prc_catalogue extends Model
{
    protected $table = 'prc_catalogues';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'product', 'product_quantity', 'start_date', 'end_date', 'day', 'start_hour', 'end_hour', 'init', 'status', 'state'];
    protected $guarded = ['id'];

    protected $appends = array('active_day', 'active_catalogue');

    public function getActiveDayAttribute(){
        return ($this->day) & date("d");
    }

    public function getActiveCatalogueAttribute(){
//        if ((($this->day) & date("d")) && ($this->start_date >= date("Y-m-d")) && ($this->end_date >= date("Y-m-d"))){
        if ( ((($this->day) & date("d")) > 0) || is_null($this->day)){
            $catalogue_active_day = 1;
        } else{
            $catalogue_active_day = 0;
        }

        if ( ($this->start_date >= date("d/m/Y")) || is_null($this->start_date) ){
            $catalogue_active_start_date = 1;
        } else{
            $catalogue_active_start_date = 0;
        }

        if ( ($this->end_date <= date("d/m/Y")) || is_null($this->end_date) ){
            $catalogue_active_end_date = 1;
        } else{
            $catalogue_active_end_date = 0;
        }

        if ( ($this->start_hour >= date("H:i:s")) || is_null($this->start_hour) ){
            $catalogue_active_start_hour = 1;
        } else{
            $catalogue_active_start_hour = 0;
        }

        if ( ($this->end_hour <= date("H:i:s")) || is_null($this->end_hour) ){
            $catalogue_active_end_hour = 1;
        } else{
            $catalogue_active_end_hour = 0;
        }


//        if ((((($this->day) & date("d")) > 0) || is_null($this->day)) && (($this->start_date >= date("Y-m-d") || is_null($this->start_date))) && ($this->end_date <= date("Y-m-d"))){

        /*if( ($catalogue_active_day + $catalogue_active_start_date + $catalogue_active_end_date + $catalogue_active_start_hour + $catalogue_active_end_hour) == 5){
            return "active";
        } else {
            return "inactive";
        }*/

        return($catalogue_active_day + $catalogue_active_start_date + $catalogue_active_end_date + $catalogue_active_start_hour + $catalogue_active_end_hour);
//        return ($this->day) & date("d");
    }

    /*public function getCatalogueCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if ( ! array_key_exists('commentsCount', $this->relations))
            $this->load('commentsCount');

        $related = $this->getRelation('commentsCount');

        // then return the count directly
        return ($related) ? (int) $related->aggregate : 0;
    }*/

    //Accessors used to format attributes for retrieving start and and date from the database.
    public function getStartDateAttribute($value)
    {
        return Date::parse($value)->format('d/m/Y');
    }

    public function getEndDateAttribute($value)
    {
        return Date::parse($value)->format('d/m/Y');
    }

    //Mutators used to format the attributes before saving them to the database.
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Date::createFromFormat('d/m/Y', $value);
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Date::createFromFormat('d/m/Y', $value);
    }
}

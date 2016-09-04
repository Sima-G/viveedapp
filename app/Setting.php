<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Viveed
//use Carbon;
use Jenssegers\Date\Date;
//Date::setLocale('nl');


class Setting extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['type', 'title', 'logo', 'description', 'start_date', 'end_date', 'date_range', 'init', 'status'];
    protected $guarded = ['id'];

    protected $appends = array('config_start_date', 'config_end_date');

    private function getStartDateValue() {
//        return Carbon::parse($this->attributes['start_date']);
        return Date::parse($this->attributes['start_date']);
    }

    public function getConfigStartDateAttribute() {
//        return Carbon\Carbon::parse($this->start_date)->format('d/m/Y');
        return Date::parse($this->start_date)->format('d/m/Y');
    }

    public function getConfigEndDateAttribute() {
//        return Carbon\Carbon::parse($this->end_date)->format('d/m/Y');
        return Date::parse($this->end_date)->format('d/m/Y');
    }

}
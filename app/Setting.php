<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//Viveed
use Carbon;



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

    /*protected $casts = [
        'date_range' => 'array', // Will convarted to (Array)
    ];*/

    protected $appends = array('config_start_date', 'config_end_date');

    /*public function formattedStartDate()
    {
        return strtotime($this->start_date);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value->format('M d Y');
    }*/

    private function getStartDateValue() {
//        return date('m/d/Y', strtotime($this->attributes['start_date']));
//        return Carbon\Carbon::createFromFormat('YYYY-MM-DD', $this->attributes['start_date']);
        return Carbon::parse($this->attributes['start_date']);
    }

    /*public function getStartDateAttribute($date) {
        return Carbon\Carbon::parse($date)->format('d/m/Y');
    }*/

    public function getConfigStartDateAttribute() {
        return Carbon\Carbon::parse($this->start_date)->format('d/m/Y');
    }

    public function getConfigEndDateAttribute() {
        return Carbon\Carbon::parse($this->end_date)->format('d/m/Y');
    }

    /*public function getStartDateFormattedAttribute() {
        return Carbon\Carbon::parse($this->start_date)->format('d/m/Y');
    }

    public function getEndDateFormattedAttribute() {
        return Carbon\Carbon::parse($this->end_date)->format('d/m/Y');
    }*/

}
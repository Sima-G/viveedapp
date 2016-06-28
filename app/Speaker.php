<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'speakers';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['firstname', 'lastname', 'description', 'email'];
    protected $guarded = ['id'];

//    protected $appends = ['is_value', 'is_text'];

    protected $appends = array('value', 'full_name', 'text');

    public function getFullNameAttribute()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function getValueAttribute()
    {
        return $this->id;
    }

    public function getTextAttribute()
    {
        return $this->firstname . " " . $this->lastname;
    }

//    public function getIsValueAttribute()
//    {
//        return $this->attributes['value'] == 'yes';
//    }
//
//    public function getIsTextAttribute()
//    {
//        return $this->attributes['text'] == 'yes';
//    }

    public function sessions()
    {
        return $this->belongsToMany('App\Session');
    }

}
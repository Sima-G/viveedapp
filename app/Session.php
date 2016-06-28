<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'description', 'start_time', 'end_time', 'date'];
    protected $guarded = ['id'];

    public function speakers()
    {
        return $this->belongsToMany('App\Speaker')->withTimestamps();
    }

}
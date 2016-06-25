<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    protected $fillable = ['type', 'title', 'logo', 'description', 'start_date', 'end_date'];
    protected $guarded = ['id'];

}
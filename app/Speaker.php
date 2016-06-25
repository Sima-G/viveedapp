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

}
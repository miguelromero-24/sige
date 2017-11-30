<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attribute that are mass assignable
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'birthday', 'cellphone', 'email', 'city_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cities()
    {
        return $this->belongsTo('App\Models\Cities', 'city_id');
    }

    public function schools()
    {
        return $this->belongsToMany('App\Models\Schools', 'school_teachers', 'teacher_id', 'school_id');
    }

}
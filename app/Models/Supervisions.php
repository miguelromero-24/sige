<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supervisions extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the Model
     * @var string
     */
    protected $table = 'supervisions';

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['description'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function schools()
    {
        return $this->hasMany('App\Models\Schools', 'supervision_id', 'id');
    }
}
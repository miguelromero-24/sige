<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cities extends Model
{
    /**
     * The database table used by the model
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attribute that are mass assignable
     * @var array
     */
    protected $fillable = ['description', 'department_id'];

    protected $dates = ['created_at', 'updated_at'];

}
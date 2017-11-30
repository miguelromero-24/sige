<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shift';
    /**
     * The values that are mass assignable
     * @var array
     */
    protected $fillable = ['description'];

}
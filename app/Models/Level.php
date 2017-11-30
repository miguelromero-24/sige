<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    /**
     * The values that are mass assignable
     * @var array
     */
    protected $fillable = ['description'];

}
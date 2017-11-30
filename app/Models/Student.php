<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    /**
     * The values that are mass assignable
     * @var array
     */
    protected $fillable = ['first_name', 'last_name'];

}
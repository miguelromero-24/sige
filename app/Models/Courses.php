<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    /**
     * The values that are mass assignable
     * @var array
     */
    protected $fillable = ['description', 'level_id', 'teacher_id', 'shift_id'];

    public function teachers()
    {
        return $this->belongsTo('App\Moders\Teachers', 'teacher_id');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level', 'level_id');
    }

    public function shift()
    {
        return $this->belongsTo('App\Models\Shift', 'shift_id');
    }
}
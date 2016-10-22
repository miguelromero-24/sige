<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schools extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model
     * @var string
     */
    protected $table = 'schools';

    /**
     * The attribute that are mass assignable
     * @var array
     */
    protected $fillable = ['description', 'address', 'principal', 'city_id', 'supervision_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    
    public function supervision()
    {
        return $this->hasOne('App\Models\Supervisions', 'id', 'supervision_id');
    }
}
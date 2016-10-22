<?php

namespace App\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole
{
    /**
     * The connection name for the model
     * @var string
     */
    protected $connection = 'sige_auth';

    /**
     * The values that are mass assignable
     * @var array
     */
    protected $fillable = ['name', 'description', 'slug', 'permissions'];

    /**
     * Kill all the Users session assigned to this role
     */
    public function killUsersSession()
    {
        foreach ($this->users as $user) {
            if (!($user->persistences->isEmpty())) {
                foreach ($user->persistences as $persistence) {
                    $persistence->delete();
                }
            }
        }
    }
}
<?php namespace App\Models;

use Cartalyst\Sentinel\Permissions\PermissionsInterface;
use Cartalyst\Sentinel\Permissions\PermissionsTrait;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model implements PermissionsInterface
{

    use PermissionsTrait {
        hasAccess as traitHasAccess;
        hasAnyAccess as traitHasAnyAccess;
    }

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sige_auth';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission',
        'description'
    ];

    /**
     * {@inheritDoc}
     */
    protected function createPreparedPermissions()
    {
        $prepared = [];

        if (!empty($this->secondaryPermissions)) {
            foreach ($this->secondaryPermissions as $permissions) {
                $this->preparePermissions($prepared, $permissions);
            }
        }

        if (!empty($this->permissions)) {
            $permissions = [];

            $this->preparePermissions($permissions, $this->permissions);

            $prepared = array_merge($prepared, $permissions);
        }

        return $prepared;
    }

    public function hasAccess($permissions)
    {
        $parts = explode('.', $permissions);

        if (!$this->traitHasAccess($parts[0]))
            return false;

        return $this->traitHasAccess($permissions);
    }

    public function hasAnyAccess($permissions)
    {

        if (is_string($permissions)) {
            $permissions = func_get_args();
        }

        $passedPermissions = [];

        foreach ($permissions as $permission) {

            $parts = explode('.', $permission);

            if ($this->traitHasAccess($parts[0]))
                $passedPermissions[] = $permission;

        }

        if (empty($passedPermissions))
            return false;

        return $this->traitHasAnyAccess($permissions);
    }

}

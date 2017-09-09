<?php

namespace Modules\Role\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Role\Entities\Role;

class RolePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  Role  $role
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->hasPermission($user, 'ROLE_VIEW');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->hasPermission($user, 'ROLE_CREATE');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  Role  $role
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->hasPermission($user, 'ROLE_EDIT');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  Role  $role
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->hasPermission($user, 'ROLE_DELETE');
    }

    private function hasPermission($user, $key)
    {
        $userRole = $user->getUserRole();
        if (is_null($userRole)) {
            return false;
        } else {
            return ($userRole->permission()->where('key',$key)->count());
        }

    }
}

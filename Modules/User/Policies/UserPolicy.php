<?php

namespace Modules\User\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->hasPermission($user, 'USER_VIEW');
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->hasPermission($user, 'USER_CREATE');
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->hasPermission($user, 'USER_EDIT');
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->hasPermission($user, 'USER_DELETE');
    }

    public function updateRole(User $user)
    {
        return $this->hasPermission($user, 'USER_CHANGE_ROLE');
    }

    private function hasPermission($user, $key)
    {
        return ($user->role()->first()->permission()->where('key',$key)->count());
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Role\Entities\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getUserRoleName()
    {
        $userRole = $this->getUserRole();
        if (is_null($userRole)) {
            return null;
        } else {
            return $this->role()->first()->name;
        }
    }

    public function getUserRoleId()
    {
        $userRole = $this->getUserRole();
        if (is_null($userRole)) {
            return null;
        } else {
            return $this->role()->first()->id;
        }
    }

    public function getUserRole()
    {
        return $this->role()->first();
    }

    public function isSuperAdmin()
    {
        return ($this->getUserRoleName() == 'Super Admin');
    }
}

<?php

namespace Modules\Role\Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Role\Entities\Permission;
use Modules\Role\Entities\Role;
use Nwidart\Modules\Facades\Module;

class SuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $roleModule = Module::find('Role');
        $requires = $roleModule->getRequires();
        $userModuleName = $requires[0];
        $userModule = Module::find($userModuleName);
        $userPermissions = config($userModule->alias . '.ACL');

        $role = new Role();
        $role->name = 'Super Admin';

        $role->save();

        $user = User::find(1);
        $user->role()->attach($role->id);
        $user->save();

    }
}

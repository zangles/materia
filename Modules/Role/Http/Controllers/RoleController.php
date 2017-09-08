<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Role\Entities\Permission;
use Modules\Role\Entities\Role;
use Nwidart\Modules\Facades\Module;
use Styde\Html\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles = Role::All();
        $modulesPermissions = $this->getAllModulePermssions();

        return view('role::index', compact('roles','modulesPermissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $modulesPermissions = $this->getAllModulePermssions();
        return view('role::create', compact('modulesPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('rolname');

        $role->save();

        $permissions = $request->input('check_permission');
        if (!is_null($permissions)) {
            foreach ($permissions as $permission) {
                $per = new Permission();
                $per->key = $permission;

                $role->permission()->save($per);
            }
        }

        return redirect()->route('role.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('role::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update', Role::class);

        $role = Role::findOrFail($id);
        $modulesPermissions = $this->getAllModulePermssions();
        return view('role::edit', compact('role','modulesPermissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Role::class);
        $role = Role::findOrFail($id);

        $this->delete($id);
        $this->store($request);

        return redirect()->route('role.index');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request ,$id)
    {
        $this->authorize('delete', Role::class);

        $this->delete($id);

        $message = 'El rol fue borrado correctamente.';

        if ($request->ajax()) {
            return response()->json(['success'=>true, 'data'=>['message'=>$message]]);
        }else{
            Alert::success($message);
            return redirect()->route('user.index');
        }
    }

    /**
     * @param $id
     */
    private function delete($id) {
        $role = Role::findOrFail($id);
        $role->delete();
    }

    /**
     * @return array
     */
    private function getAllModulePermssions()
    {
        $permissions = [];

        foreach (Module::getOrdered() as $module) {
            $permissions[$module->name] = config($module->alias . '.ACL');
        }

        return $permissions;
    }
}

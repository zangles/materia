<?php

namespace Modules\User\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Styde\Html\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('user::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  StoreUser $request
     * @return Response
     */
    public function store(StoreUser $request)
    {
        $newUser = new User();
        $newUser->name = $request->input('Nombre');
        $newUser->email = $request->input('Email');
        $newUser->password = \Hash::make($request->input('password'));

        $newUser->save();

        Alert::success('El usuario fue dado de alta correctamente.');

        return redirect()->route('user.index');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user::edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateUser $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request ,$id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::success('El usuario fue borrado correctamente.');

        return redirect()->route('user.index');

    }
}

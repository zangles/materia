<?php

namespace Modules\User\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Routing\Controller;
use Styde\Html\Facades\Alert;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->authorize('view', User::class);

        $users = User::all();
        return view('user::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  StoreUser $request
     * @return Response
     */
    public function store(StoreUser $request)
    {
        $this->authorize('create', User::class);

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
        $this->authorize('update', User::class);
        $user = User::findOrFail($id);
        return view('user::edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->authorize('update', User::class);

        $user = User::findOrFail($request->input('id'));
        $name = $request->input('Nombre');
        $email = $request->input('Email');
        $password = $request->input('password');

        $request->validate([
            'Nombre' => 'required',
            'Email' => 'required|unique:users,email,'.$user->id,
            'oldPassword' => 'required_with:password',
            'password' => 'required_with:oldPassword',
            'password2' => 'required_with:password|same:password',
        ]);

        $user->name = $name;
        $user->email = $email;
        if (!is_null($password)) {
            $user->password = \Hash::make($password);
        }
        $user->save();

        Alert::success('El usuario fue modificado correctamente.');

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request ,$id)
    {
        $this->authorize('delete', User::class);

        $user = User::findOrFail($id);
        $user->delete();

        $message = 'El usuario fue borrado correctamente.';
        if ($request->ajax()) {
            return response()->json(['success'=>true, 'data'=>['message'=>$message]]);
        }else{
            Alert::success($message);
            return redirect()->route('user.index');
        }

    }
}

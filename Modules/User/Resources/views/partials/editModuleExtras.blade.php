@if (Module::has('Role'))
    <div class="form-group">
        <label class="control-label">Rol</label>

        @if (Auth::user() == $user)
            <input type="text" disabled="disabled" class="form-control" value="{{ $user->role()->first()->name }}">
            <input type="hidden" name="role" value="{{ $user->role()->first()->id }}">
        @else
            <select class="form-control m-b" name="role">
                <option></option>
                @foreach(\Modules\Role\Entities\Role::all() as $role)
                    <option value="{{ $role->id }}" @if($user->role()->first()->id == $role->id) selected @endif >{{ $role->name }}</option>
                @endforeach
            </select>
        @endif
    </div>
@endif
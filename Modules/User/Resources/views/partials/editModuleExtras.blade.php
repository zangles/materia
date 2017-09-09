@if (in_array('Role',Module::enabled()))
    <div class="form-group">
        <label class="control-label">Rol</label>

        @if (Auth::user() == $user)
            <input type="text" disabled="disabled" class="form-control" value="{{ $user->getUserRoleName() }}">
            <input type="hidden" name="role" value="{{ $user->getUserRoleId() }}">
        @else
            <select class="form-control m-b" name="role">
                <option></option>
                @foreach(\Modules\Role\Entities\Role::all() as $role)
                    <option value="{{ $role->id }}" @if($user->getUserRoleId() == $role->id) selected @endif >{{ $role->name }}</option>
                @endforeach
            </select>
        @endif
    </div>
@endif
@if (in_array('Role',Module::enabled()))
    <div class="form-group">
        <label class="control-label">Rol</label>

        <select class="form-control m-b" name="role">
            <option></option>
            @foreach(\Modules\Role\Entities\Role::all() as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
@endif
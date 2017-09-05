<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>listado de Usuarios</h5></span>
    </div>
    <div class="ibox-content">
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('user.edit',$user) }}" class="btn btn-success" type="button" title="Editar"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('user.destroy', $user) }}" method="post" style="display: inline-block;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit" title="Borrar"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
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
                <tr id="tr_{{ $user->id }}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @can('update', \App\User::class)
                            <a href="{{ route('user.edit',$user) }}" class="btn btn-success" type="button" title="Editar"><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('delete', \App\User::class)
                            @if($user != Auth::user())
                                <button class="btn btn-danger deleteUser" data-url="{{ route('user.destroy', $user) }}" data-id="{{ $user->id }}" data-name="{{ $user->name }}" type="button" title="Borrar"><i class="fa fa-trash"></i></button>
                            @endif
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function(){
        $(".deleteUser").click(function(){
            var name = $(this).data('name');
            var userId = $(this).data('id');
            var url = $(this).data('url');
            swal({
                    title: "Esta seguro que quiere eliminar a "+name+"?",
                    text: "Este cambio no puede deshacerse!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#ed5565",
                    confirmButtonText: "Si, borralo!",
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function(){
                    var data = {
                        '_token': '{{ csrf_token() }}',
                        'id': userId
                    };

                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: data,
                        success: function(result){
                            if (result.success === true){
                                swal({
                                        title: "Borrado!",
                                        text: result.data.message,
                                        type: "success",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: true
                                });
                                $("#tr_"+userId).remove();
                            }else{
                                swal({
                                    title: "Ups!",
                                    text: result.data.message,
                                    type: "error",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: true
                                });
                            }
                        },
                        error: function (data) {
                            swal({
                                    title: "Ups!",
                                    text: data.responseJSON.message,
                                    type: "error",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: true
                            });
                        }
                    });

                });
        });
    });
</script>
@endsection
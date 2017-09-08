@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Roles</h2>
            <?php
                $breadcrum = [
                    'Modulo Roles' => '',
                    'Roles' => route('role.index')
                ];
            ?>
            @include('breadcrumb.index')
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                @can('create', \App\User::class)
                    <a href="{{ route('role.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Nuevo Rol
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        {!! Alert::render() !!}
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>listado de Roles</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th width="200px">Acciones</th>
                                </tr>
                            </thead>
                            <thead>
                                @foreach($roles as $role)
                                    <tr id="tr_{{ $role->id }}">
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @include('role::partials.modalPermissions')
                                            @if (Auth::user()->can('update', $role))
                                                <a href="{{ route('role.edit', $role) }}" class="btn btn-success">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            @if (Auth::user()->can('delete', $role))
                                                <button class="btn btn-danger deletePermission" data-name="{{ $role->name }}" data-id="{{ $role->id }}" data-url="{{ route('role.destroy', $role) }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".deletePermission").click(function(){
                var name = $(this).data('name');
                var roleId = $(this).data('id');
                var url = $(this).data('url');
                swal({
                        title: "Esta seguro que quiere eliminar el rol "+name+"?",
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
                            'id': roleId
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
                                    $("#tr_"+roleId).remove();
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
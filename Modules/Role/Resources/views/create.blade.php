@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Nuevo Rol</h2>
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
                <a href="" class="btn btn-danger" onclick="parent.history.back();">
                    <i class="fa fa-chevron-left"></i>
                    Volver
                </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        {!! Alert::render() !!}
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Informacion del rol</h5>
                    </div>
                    <div class="ibox-content">
                        <form action="{{ route('role.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="rolname">Nombre rol</label>
                                <input type="text" class="form-control" id="rolname" name="rolname">
                            </div>
                            <div class="row">
                                @foreach($modulesPermissions as $module=>$permissions)
                                    <div class="col-md-6">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-title text-center">
                                                <h2><strong>Modulo {{ $module }}</strong></h2>
                                            </div>
                                            <div class="ibox-content">
                                                @foreach($permissions as $permission=>$son)
                                                    <div class="input-group" style="margin-top: 5px">
                                                        <label type="text" class="form-control">{{ $permission }}</label>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-white btnRol" data-permission="{{ $permission }}" type="button" data-toggle="button">
                                                                <a class="fa fa-check" style="text-decoration: none"></a>
                                                            </button>
                                                        </span>
                                                        <input type="checkbox" id="check_{{ $permission }}" value="{{ $permission }}" name="check_permission[]" style="display: none">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="ibox-footer text-right">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".btnRol").click(function(){
                var check = $("#check_"+$(this).data('permission'));
                check.trigger('click');
            });
        });
    </script>
@endsection

@section('style')
    <style>
        .input-group-btn .btn.active, .btn:active {
            background-color: #5cb85c; !important;
        }
        .btn.active a.fa{
            color: white;
        }
        .btn a.fa{
            color: black;
        }
    </style>
@endsection
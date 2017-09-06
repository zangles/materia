@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Nuevo Usuario</h2>
            <?php
                $breadcrum = [
                    'Modulo Usuario' => '',
                    'Usuarios' => route('user.index'),
                    'Nuevo' => ''
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
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="ibox float-e-margins">
                    <form action="{{ route('user.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="ibox-title">
                            <h5>Datos del Usuario</h5>
                        </div>
                        <div class="ibox-content">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
                            {!! Field::text('Nombre',old('Nombre')) !!}
                            {!! Field::text('Email',old('Email')) !!}
                            <div id="field_password" class="form-group" >
                                <label for="password" class="control-label">
                                    Contraseña
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="password" name="password" type="password">
                                </div>
                            </div>
                            <div id="field_password2" class="form-group">
                                <label for="password2" class="control-label">
                                    Repetir Contraseña
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="password2" name="password2" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="ibox-footer text-right">
                            <input type="submit" class="btn btn-primary" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Usuarios</h2>
            <?php
                $breadcrum = [
                    'Modulo Usuario' => '',
                    'Usuarios' => route('user')
                ];
            ?>
            @include('breadcrumb.index')
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Nuevo usuario
                </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                @include('user::partials.userList')
            </div>
        </div>
    </div>

@endsection
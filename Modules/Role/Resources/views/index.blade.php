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
            <div class="col-md-offset-2 col-md-8">

            </div>
        </div>
    </div>

@endsection
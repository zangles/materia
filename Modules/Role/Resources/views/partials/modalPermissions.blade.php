<button class="btn btn-info" data-toggle="modal" data-target="#modal_{{ $role->id }}">
    <i class="fa fa-eye" aria-hidden="true"></i>
</button>

<div id="modal_{{ $role->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Permisos del rol {{ $role->name }}</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($modulesPermissions as $module=>$permissions)
                        <div class="col-md-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title text-center">
                                    <h2><strong>Modulo {{ $module }}</strong></h2>
                                </div>
                                <div class="ibox-content">
                                    @foreach($permissions as $permission=>$son)
                                        <div class="row">
                                            <div class="col-md-8 text-right">
                                                <label>{{ $permission }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                @if($role->hasPermission($permission))
                                                    <i class="fa fa-check text-navy" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
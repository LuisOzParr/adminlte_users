<!-- Aqui va todo el contenido -->
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Roles</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <a href="{!! route('roles.create') !!}" class="btn btn-warning btn-sm" id="publicar">
                        <i class="fa fa-plus-circle"></i>  Nuevo Rol
                    </a>
                </div>
                <!-- /. tools -->
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>Nombre</td>
                        <td>Nivel</td>
                        <td>Op</td>
                    </tr>
                    @isset($roles)
                        @foreach($roles as $rol)
                            <tr class="{{ $rol->nombre === 'root' ? 'danger' : '' }}">
                                <td>{!! $rol->nombre !!}</td>
                                <td>{!! $rol->nivel !!}</td>
                                <td>
                                    <a href="{!! route('roles.edit',['id'=>$rol->id]) !!}" type="button" class="btn btn-xs btn-warning">
                                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                    </a>
                                    <a href="{!! route('roles.destroy',['id'=>$rol->id]) !!}" type="button" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que deseas eliminar el cliente?')">
                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                @if(isset($entradas))
                    {!! $entradas->render() !!}
                @endif
            </div>
        </div>
    </div>

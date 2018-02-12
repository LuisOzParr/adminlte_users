@extends('admin_templeta::templetas.admin.index')

@section('titulo', 'Usuarios')

@section('direccion')
    Admin/<a href="">Usuarios</a>
@endsection

@section('contenido')

    <!-- Aqui va todo el contenido -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Usuarios</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="{!! route('adminUsuarios.create') !!}" class="btn btn-warning btn-sm" id="publicar">
                            <i class="fa fa-plus-circle"></i>  Nuevo Usuario
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
                            <td>Email</td>
                            <td>Rol</td>
                            <td>Op</td>
                        </tr>
                        @isset($usuarios)
                            @foreach($usuarios as $user)
                                <tr class="{{ $user->name === 'root' ? 'danger' : '' }}">
                                    <td>{!! $user->name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->rol->nombre!!}</td>
                                    <td>
                                        <a href="{!! route('adminUsuarios.edit',['id'=>$user->id]) !!}" type="button" class="btn btn-xs btn-warning">
                                            <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                        </a>
                                        <a href="{!! route('adminUsuarios.editPass',['id'=>$user->id]) !!}" type="button" class="btn btn-xs btn-warning">
                                            <span class="fa fa-key" aria-hidden="true"></span>
                                        </a>
                                        <a href="{!! route('adminUsuarios.destroy',['id'=>$user->id]) !!}" type="button" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que deseas eliminar el cliente?')">
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
        @include('admin_login::adminRoles.index')
    </div>

@endsection

@section('scripts')
    <!-- Aqui van otros scripts -->
@endsection
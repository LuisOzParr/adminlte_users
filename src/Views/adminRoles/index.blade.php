<!-- Aqui va todo el contenido -->
    <div class="col-md-6">
        <x-card>
            <x-slot name="tools">
                <a href="{!! route('roles.create') !!}" class="btn btn-warning btn-sm" id="publicar">
                    <i class="fa fa-plus-circle"></i>  Nuevo Rol
                </a>
            </x-slot>
            <x-slot name="title">
                <i class="fas fa-user-tag"></i>
                Roles
            </x-slot>
            <div class="table-responsive">
                <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Nombre</td>
                    <td>Nivel</td>
                    <td>Opciones</td>
                </tr>
                @isset($roles)
                    @foreach($roles as $rol)
                        <tr class="{{ $rol->nombre === 'root' ? 'danger' : '' }}">
                            <td>{!! $rol->nombre !!}</td>
                            <td>{!! $rol->nivel !!}</td>
                            <td class="text-center">
                                <a href="{!! route('roles.edit',['role'=>$rol->id]) !!}" type="button" class="btn btn-xs btn-warning">
                                    <span class="fas fa-user-edit" aria-hidden="true"></span>
                                </a>
                                <a href="{!! route('roles.destroy',['id'=>$rol->id]) !!}" type="button" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que deseas eliminar el cliente?')">
                                    <span class="fas fa-minus" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
            </div>
            @if(isset($entradas))
                <x-slot name="footer">
                    {!! $entradas->render() !!}
                </x-slot>
            @endif
        </x-card>
    </div>

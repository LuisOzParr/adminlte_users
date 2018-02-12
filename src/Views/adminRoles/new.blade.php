@extends('admin_templeta::templetas.admin.index')

@section('titulo', 'Usuarios')

@section('direccion')
@endsection

@section('contenido')

    {!! Form::open(['class'=>'form', 'method'=>'POST', 'route'=>'roles.store']) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo Rol</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="name" >Nombre</label>
                        <input id="name" type="text" class="form-control" name="nombre" value="{{ old('name') }}" required autofocus>
                        <span class="help-block">
                            {!!  $errors->has('nombre') ? '<strong>'.$errors->first('nombre').'</strong>' : '' !!}
                        </span>
                    </div>

                    <div class="form-group{{ $errors->has('nivel') ? ' has-error' : '' }}">
                        <label for="email">Nivel</label>
                        <input id="email" type="number" class="form-control" name="nivel" value="{{ old('nivel') }}" required>
                        <span class="help-block">
                        {!!  $errors->has('nivel') ? '<strong>'.$errors->first('nivle').'</strong>' : '' !!}
                         </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

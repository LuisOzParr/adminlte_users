@extends('admin_templeta::templetas.admin.index')

@section('titulo', 'Usuarios')

@section('direccion')
@endsection

@section('contenido')

    {!! Form::open(['class'=>'form', 'method'=>'PUT', 'route'=>['adminUsuarios.update', 'id'=>$user->id], 'files'=>true, ]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar usuario "<b>{!! $user->name !!}</b>"</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                    <div class="image">
                        <a href="#">
                            <img src="{{isset($user) ? url($user->img) : '' }}" alt="" style="max-height: 80px" class="img-responsive img-circle">
                        </a>
                    </div>

                    <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                        <label>Anexar Fotos</label>
                        <div class="file-loading">
                            <input class="file" type="file" name="img" value="{{ old('img') }}">
                        </div>
                        <span class="help-block">{!! $errors->first('img') !!} </span>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" >Nombre</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}{{isset($user) ? $user->name : '' }}" required autofocus>
                        <span class="help-block">
                            {{ $errors->has('name') ? '<strong>'.$errors->first('name').'</strong>' : '' }}
                        </span>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }} {{isset($user) ? $user->email : '' }}" required>
                        <span class="help-block">
                        {{ $errors->has('name') ? '<strong>'.$errors->first('email').'</strong>' : '' }}
                         </span>
                    </div>

                    <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol">
                            @foreach($roles as $rol)
                                <option value="{!! $rol->id !!}">{!! $rol->nombre !!}</option>
                            @endforeach
                        </select>
                        <span class="help-block">
                        {{ $errors->has('name') ? '<strong>'.$errors->first('rol').'</strong>' : '' }}
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

@section('scripts')
    <script type="application/javascript">
        $(document).ready(function () {
            @if(isset($user))
            $('#rol').val({{ $user->rol->id }})
            @endif
        });
    </script>
@endsection()
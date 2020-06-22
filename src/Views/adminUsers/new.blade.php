@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-form method="POST" :action="route('register')" enctype="multipart/form-data">
                <x-card title="Nuevo usuario">
                    @if(config('loginoz.user.image'))
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
                    @endif

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

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <span class="help-block">
                        {{ $errors->has('name') ? '<strong>'.$errors->first('password').'</strong>' : '' }}
                    </span>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </div>
                </x-card>
            </x-form>
        </div>
    </div>
@stop

@section('js')
    <script type="application/javascript">
        $(document).ready(function () {
            @if(isset($user))
            $('#rol').val({{ $user->rol->id }})
            @endif
        });
    </script>
@endsection()

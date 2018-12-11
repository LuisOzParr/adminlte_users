@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <form class="form" method="post" action="{{route('adminUsuarios.updatePass',['id'=>$user->id])}}" >
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cambiar Contraseña <b>"{!! $user->name !!}"</b></h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

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
                            <button type="submit" class="btn btn-warning">
                                Cambiar
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

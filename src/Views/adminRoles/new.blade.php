@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-form method="POST" :action="route('roles.store')">
                <x-card title="Nuevo Rol">
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

                    <x-slot name="footer">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </x-slot>
                </x-card>
            </x-form>
        </div>
    </div>
@stop
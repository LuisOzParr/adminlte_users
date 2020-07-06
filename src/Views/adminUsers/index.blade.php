{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    @include('flash::message')
    <h1>Usuarios</h1>
@stop

@section('content')
    <!-- Aqui va todo el contenido -->
    <div class="row">
        <div class="col-md-6">
            <x-card>
                <x-slot name="title">
                    <i class="fas fa-user"></i>
                    Usuarios
                </x-slot>
                <x-slot name="tools">
                    <a href="{!! route('adminUsuarios.create') !!}" class="btn btn-warning btn-sm" id="publicar">
                        <i class="fa fa-plus-circle"></i>  Nuevo Usuario
                    </a>
                </x-slot>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>Nombre</td>
                        <td>Email</td>
                        <td>Rol</td>
                        <td>Opciones</td>
                    </tr>
                    @isset($usuarios)
                        @foreach($usuarios as $user)
                            <tr class="{{ $user->name === 'root' ? 'danger' : '' }}">
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->rol->nombre!!}</td>
                                <td class="text-center">
                                    <a href="{!! route('adminUsuarios.edit',['adminUsuario'=>$user->id]) !!}" type="button" class="btn btn-xs btn-warning">
                                        <span class="fas fa-user-edit" aria-hidden="true"></span>
                                    </a>
                                    <a href="{!! route('adminUsuarios.editPass',['id'=>$user->id]) !!}" type="button" class="btn btn-xs btn-warning">
                                        <span class="fas fa-key" aria-hidden="true"></span>
                                    </a>
                                    <a href="{!! route('adminUsuarios.destroy',['id'=>$user->id]) !!}" type="button" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que deseas eliminar el cliente?')">
                                        <span class="fas fa-user-minus" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
                </div>
            </x-card>
        </div>
        @include('adminlte_users::adminRoles.index')
    </div>
@stop


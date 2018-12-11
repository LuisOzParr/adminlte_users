<?php

namespace Ozparr\AdminLogin\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ozparr\AdminLogin\Models\Rol;


class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('rolByLvl:1');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_login::adminRoles.new');
    }


    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'nombre' => 'string|max:25|unique:roles,nombre',
            'nivel' => 'digits_between:0,100|numeric'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $rol = new Rol($request->all());
        $rol->save();
        flash('Se a guardado correctameten el rol')->success();

        return redirect()->route('adminUsuarios.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol::find($id);
        return view('admin_login::adminRoles.editar', compact('rol') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = \Validator::make($request->all(), [
            'nivel' => 'digits_between:0,2|numeric'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $rol = Rol::find($id);
        $rol->fill($request->all());

        if(Auth::user()->rol->nivel > $rol->nivel){
            flash('No cuentas con los permisos nesesarios para editar este rol')->error();
            return redirect()->route('adminUsuarios.index');
        }

        $rol->save();
        flash('Se a actualizado correctameten el rol')->success();

        return redirect()->route('adminUsuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        flash('El rol fue borrado exitosamente')->warning();

        return redirect()->route('adminUsuarios.index');
    }

}

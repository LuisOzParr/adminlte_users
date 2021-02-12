<?php

namespace Ozparr\AdminlteUsers\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Ozparr\AdminlteUsers\Models\Rol;

class UsersController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->user = config('loginoz.user_model');
        $this->user = new $this->user;
        $this->middleware('rolByLvl:1');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->user->all();
        $roles = Rol::all();
        return view('adminlte_users::adminUsers.index', compact('usuarios','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        return view('adminlte_users::adminUsers.new',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = Rol::all();
        return view('adminlte_users::adminUsers.editar', compact('user','roles') );
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
        $user = $this->user->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol_id = $request->rol;

        if($user->img != '' ) {
            $img = explode('/',$user->img);
            Storage::delete(public_path().'/'.$img[1].'/'.$img[2].'/'.$img[3]);
        }


        if($request->hasFile('img')){
            $file = $request->file('img');
            $url = explode("/", $file->store('public/img/users'));
            $url = $url[3];

            //Guarda imagen en base de datos
            $user->img = $url;
        }

        $user->save();

        flash('El usuario "'.$user->name.'" ha sido guardado correctamente');
        return redirect()->route('adminUsuarios.index');
    }

    /**
     * @param UsersRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePass(Request $request, $id){

        $v = \Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
            'rol' => 'numeric'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $user = $this->user->find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        flash('La contraseña del usuario "'.$user->name.'" ha sido modificada correctamente');
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
        $actualUserId = Auth::user()->id;
        $user = $this->user->find($id);

        if($actualUserId == $user->id){
            flash('No puedes eliminarte a ti mismo')->warning();
            return redirect()->route('adminUsuarios.index');
        }
        if(Auth::user()->rol->nivel > $user->rol->nivel ){
            flash('Nesesitas tener un rango mas alto para eliminar este usuario')->warning();
            return redirect()->route('adminUsuarios.index');
        }


        $user->delete();
        flash('El usuario '.$user->name.' fue eliminado correctamente')->error();

        return redirect()->route('adminUsuarios.index');
    }

    public function editPass($id){
        $user = $this->user->find($id);
        return view('adminlte_users::adminUsers.updatePass', compact('user') );
    }
}

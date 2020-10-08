<?php

namespace Ozparr\AdminlteUsers\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    private $user;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/adminUsuarios';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = config('loginoz.user_model');
        $this->user = new $this->user;
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $imgIsRequired = config('loginoz.user.image') ? '|required' : '';
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rol' => 'required|numeric',
            'img' => "image|mimes:jpeg,bmp,png|max:5000{$imgIsRequired}",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (isset($data['img'])) {
            $data['img']->store('storage\img\users');
            if(isset($data['img'])){
                $url = explode("/", $data['img']->store('public/img/users'));
                $url = $url[3];
            } else{
                $url = null;
            }
        } else {
            $url = null;
        }

        $user = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rol_id' => $data['rol'],
            'img' => $url,
        ]);

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}

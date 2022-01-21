<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $new_user;
    public function __construct()
    {
        $this->middleware('guest');
        $this->new_user = new User();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nim' => ['required'],
            'angkatan_id' => ['required'],
            'prodi' => ['required', 'string'],
            'alamat' => ['required'],
            'provinsi' => ['required'],
            'hp' => ['required', 'max:13'],
            'beasiswa' => ['required'],
            'foto' => ['required'],
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    protected function create(array $data)

    {
        $nm = request()->foto;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_user->foto = $namaFile;

        $nm->move(public_path() . '/img', $namaFile);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nim' => $data['nim'],
            'angkatan_id' => $data['angkatan_id'],
            'prodi' => $data['prodi'],
            'alamat' => $data['alamat'],
            'provinsi' => $data['provinsi'],
            'hp' => $data['hp'],
            'beasiswa' => $data['beasiswa'],
            'role' => 'mahasiswa',
            'foto' => $namaFile,
        ]);

        return $user;
    }
}

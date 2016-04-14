<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Session;
use View;
use DB;
use Hash;

class AuthController extends Controller
{

	protected $guard = 'admin';

	public function getRegister() {
		return view('registration');
	}
	public function postRegister(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			echo 'flash';
			/*$this->throwValidationException($request, $validator);*/
		}
		Auth::login($this->create($request->all()));

		return $this->getRegister();
	}

	public function postLogin(Request $request) {
		$log = $request->all();
		$user = DB::table('users')->where('username', $log['username'])->first();
		if($user) {
			if(Hash::check($log['password'], $user->password)) {
				Session::put('auth', $user);
				return $this->getLogin();
			}
		} else {
			Session::flash('erreur', 'Les identifiants sont incorrects');
		}
		return view('welcome');
	}


	public function getLogin() {
		if(Session::has('auth')) {
			$session = Session::get('auth');
			$user = DB::table('users')->where('username', $session->username)->first();
			if($user) {
				return view('upload')->with('name', $session->username);
			}
		}
		return view('welcome');
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
		                       'username' => 'required|max:20|unique:users',
		                       'password' => 'required|min:4',
		                       /* 'email' => 'required|email|max:255|unique:users',*/
		                       ]);
	}

	protected function create(array $data)
	{
		$password = Hash::make($data['password']);
		return User::create([
		                    'username' => $data['username'],
		                    'password' => $password,
		                    'name' => $data['name'],
		                    'lastname' =>$data['lastname'],
		                    'email' => $data['email'],
		                    'birthdate' => $data['birthdate'],
		                    ]);
	}
	public function getLogout() {
		return view('welcome');
	}
	public function postLogout() {
		Session::flush();
		Auth::logout();
		return redirect('/');	}
	}

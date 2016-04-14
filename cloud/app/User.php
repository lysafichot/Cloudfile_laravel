<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;
class User extends Authenticatable
{
	protected $fillable = [
	'username','password','email','name', 'lastname', 'birthdate',
	];
	protected $hidden = [
	'remember_token',
	];




}

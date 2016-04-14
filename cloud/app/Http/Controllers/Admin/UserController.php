<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class UserController extends Controller {
  public function getAll() {
    return \View::make('admin.userdash');
  }









?>

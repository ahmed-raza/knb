<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function profile(){
    $user = Auth::user();
    return view('users.index', compact('user'));
  }
  public function user($id){
    $user = Auth::user();
    return view('users.index', compact('user'));
  }
}

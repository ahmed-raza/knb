<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('profile')->only('profile');
  }
  public function profile(){
    $user = Auth::user();
    return view('users.index', compact('user'));
  }
  public function show($id){
    $user = User::findorfail($id);
    return view('users.index', compact('user'));
  }
  public function logout(){
    Auth::logout();
    return redirect('/');
  }
}

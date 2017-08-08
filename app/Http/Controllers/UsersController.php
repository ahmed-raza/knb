<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;
use Storage;
use Img;
use File;
use App\User;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('profile')->except('show');
  }
  public function profile(){
    $user = Auth::user();
    return view('users.index', compact('user'));
  }
  public function show($id){
    $user = User::findorfail($id);
    return view('users.index', compact('user'));
  }
  public function edit($id){
    $user = User::findorfail($id);
    return view('users.edit', compact('user'));
  }
  public function update(UserRequest $request, $id){
    $user = User::findorfail($id);
    $pic = $request->file('pic');
    if ($pic) {
      Storage::deleteDirectory('users/'.$id);
      $imageName = time() . $pic->getClientOriginalName();
      $imageThumb = "thumb_" . time() . $pic->getClientOriginalName();
      $imagePath = 'users/' . $id . '/' . $imageName;
      $upload = Storage::put($imagePath, File::get($pic));
      Img::make(File::get($pic))
      ->resize(360, 360)
      ->save(storage_path('app/users/'.$id.'/'.$imageThumb));
      $user->pic = $imageName;
    }
    $user->update($request->except('pic'));
    return redirect(route('user.profile'))->with('message', 'User updated.');
  }
  public function delete($id){
    $user = User::findorfail($id);
    return view('users.index', compact('user'));
  }
  public function logout(){
    Auth::logout();
    return redirect('/');
  }
}

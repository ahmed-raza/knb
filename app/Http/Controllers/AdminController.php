<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\User;
use App\Image;
use App\Contact;
use Validator;
use Storage;
use DB;

class AdminController extends Controller
{

  public function __construct(){
    return $this->middleware('admin');
  }
  public function content(){
    $ads = Ad::paginate(20);
    return view('admin.content', compact('ads'));
  }
  public function users(){
    $users = User::paginate(20);
    return view('admin.users', compact('users'));
  }
  public function contactSubmissions(){
    $submissions = Contact::paginate(20);
    return view('admin.contact_submissions', compact('submissions'));
  }
  public function adsOperations(Request $request){
    $rules = ['id' => 'required'];
    $input = ['id' => $request->input('id')];
    $validator = Validator::make($input, $rules)->passes();
    if ($validator) {
      switch ($request->input('bulk_actions')) {
        case 'delete':
        Ad::destroy($request->input('id'));
        Image::where('ad_id', $request->input('id'))->delete();
        return redirect(route('admin.content'))->with('message','Ads deleted');
        break;
        case 'publish':
        foreach ($request->get('id') as $id) {
          DB::table('ads')->where('id', $id)->update(['status' => 1]);
        }
        return redirect(route('admin.content'))->with('message','Ads Published');
        break;
        case 'unpublish':
        foreach ($request->get('id') as $id) {
          DB::table('ads')->where('id', $id)->update(['status' => 0]);
        }
        return redirect(route('admin.content'))->with('message','Ads Unpublished');
        break;
      }
    } else {
        return redirect(route('admin.content'))->with('error','No item selected.');
    }
  }
}

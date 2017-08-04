<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class PagesController extends Controller
{
  public function index(){
    $ads = Ad::where('status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
    return view('pages.index', compact('ads'));
  }
  public function about(){
    $ads = Ad::where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
    return view('pages.about', compact('ads'));
  }
  public function team(){
    return view('pages.team');
  }
}

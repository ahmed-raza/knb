<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use Mail;

class ContactController extends Controller
{
  public function index(){
    return view('pages.contact');
  }
  public function store(ContactRequest $request){
    $contact = Contact::create($request->all());
    if ($contact) {
      $this->sendMail($request);
    }
    return redirect(route('contact.index'))->with('message', 'Thank you for your submission, someone from our team will contact you shortly.');
  }
  private function sendMail($request){
    $from = $request->get('email');
    $name = $request->get('name');
    $subject = $request->get('subject');
    $mail_message = $request->get('message');
    $data = [
      'from'=>$from,
      'name'=>$name,
      'subject'=>$subject,
      'mail_message'=>$mail_message,
    ];
    $mail = Mail::send('mail.contact', $data, function($message) use ($from, $subject){
      $message->from($from);
      $message->to('ahmed.raza@square63.com')->subject($subject);
    });
    if ($mail) {
      return true;
    }else{
      return false;
    }
  }
}

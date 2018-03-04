<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Mail;

class ContactController extends Controller
{
  public function getContact()
  {
    return view('contact');
  }

  // Confirmer l'envoi et rediriger vers l'accueil
  public function postContact(Request $request)
	{
    Mail::send('email_contact', $request->all(), function($message)
		{
			$message->to('enzo.wiartz@gmail.com')->subject('INSAviron Contact');
		});
    return "<meta http-equiv='refresh' content='5; url=".route('home')."'> Message envoyé, redirection dans 5 secondes.";
	}
}

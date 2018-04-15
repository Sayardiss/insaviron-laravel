<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

class InscriptionController extends Controller
{
  public function getInscription()
  {
    return view('inscription');
  }

  // Confirmer l'envoi et rediriger vers l'accueil
  public function postInscription(Request $request)
	{
    // Générer nom safe et unique
    $prefix_filename = preg_replace('/[^A-Za-z0-9]/', '', $request->input('nom_respo'));
    $random = uniqid();
    $basefile = $prefix_filename . '_' . $random;

    $file = fopen('../storage/app/inscription_files/' . $basefile . ".csv", "w");

    $data = [ 'nom_respo' => $request->input('nom_respo'),
              'adresse'   => $request->input('adresse'),
              'email'     => $request->input('email'),
              'numero'    => $request->input('numero'),
              '4_fem'     => $request->input('4_fem'),
              '8_fem'     => $request->input('8_fem'),
              '4_mal'     => $request->input('4_mal'),
              '8_mal'     => $request->input('8_mal'),
              '4_mix'     => $request->input('4_mix'),
              '8_mix'     => $request->input('8_mix'),
              'location'  => $request->input('location'),
              'texte'     => $request->input('texte'),
     ];

    // Écrire les données CSV
    fputcsv($file, $data, ";");
    fclose($file);

    // Sauvegarder le fichier uploadé
    if(isset($request->xls)){
      $request->xls->storeAs('inscription_files', $basefile . ".xls");
    }
    return "<meta http-equiv='refresh' content='5; url=".route('home')."'> Inscription soumise, redirection dans 5 secondes.";
	}
}

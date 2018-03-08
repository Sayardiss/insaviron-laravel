<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;

class SponsorsController extends Controller
{
  // Permet de gérer les pages autorisées sans connexion
  public function __construct()
  {
      $this->middleware('auth', ['except' => []]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      // Pas besoin d'afficher la liste des sponsors ici, on redirige vers news
      return "Pas d'index pour les sponsors";
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('sponsors.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validate($request, [
        'name' => 'required',
      ]);


      // Create Sponsor (use App\Sponsor)
      $sponsor = new Sponsor;
      $sponsor->name = $request->input('name');
      $sponsor->description = $request->input('description');
      $sponsor->link_fb = $request->input('fb');
      $sponsor->link_web = $request->input('web');
      $sponsor->pathPic = $request->input('pic');
      $sponsor->save();

      return redirect( route('home') )->with('success', 'Sponsor Created');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      // Désactivé
      $sponsor =  Sponsor::find($id);
      return view('sponsors.show')->with('sponsor', $sponsor);
      return 'Pas de vue unique pour les sponsors';
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      // Petite astuce flemmard : retourner la vue Creer sponsor avec le paramètre $edit
      $sponsor = Sponsor::find($id);
      // return view('sponsors.edit')->with('sponsor', $sponsor);
      return view('sponsors.create')->with('oldSponsor', $sponsor)->with('edit', TRUE);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
    ]);

    // Create Sponsor (use App\Sponsor)
    // Create Sponsor (use App\Sponsor)
    $sponsor = Sponsor::find($id);
    $sponsor->name = $request->input('name');
    $sponsor->description = $request->input('description');
    $sponsor->link_fb = $request->input('fb');
    $sponsor->link_web = $request->input('web');
    $sponsor->pathPic = $request->input('pic');
    $sponsor->save();

    return redirect( route('home') )->with('success', 'Sponsor Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $sponsor = Sponsor::find($id);
      $sponsor->delete();
      return redirect( route('home') )->with('success', 'Sponsor deleted');
  }
}

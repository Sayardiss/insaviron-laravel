<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;

class ResultsController extends Controller
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
      // Pas besoin d'afficher la liste des results ici, on redirige vers news
      return "Pas d'index pour les results";
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('results.create');
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
        'year' => 'required|integer',
      ]);


      // Create Result (use App\Result)
      $result = new Result;
      $result->name = $request->input('name');
      $result->description = $request->input('description');
      $result->year = $request->input('year');
      $result->save();

      return redirect( route('home') )->with('success', 'Result Created');
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
      $result =  Result::find($id);
      return view('results.show')->with('result', $result);
      return 'Pas de vue unique pour les results';
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      // Petite astuce flemmard : retourner la vue Creer result avec le paramètre $edit
      $result = Result::find($id);
      // return view('results.edit')->with('result', $result);
      return view('results.create')->with('oldResult', $result)->with('edit', TRUE);
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
      'year' => 'required|integer',
    ]);

    // Create Result (use App\Result)
    // Create Result (use App\Result)
    $result = Result::find($id);
    $result->name = $request->input('name');
    $result->description = $request->input('description');
    $result->year = $request->input('year');
    $result->save();

    return redirect( route('home') )->with('success', 'Result Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $result = Result::find($id);
      $result->delete();
      return redirect( route('home') )->with('success', 'Result deleted');
  }
}

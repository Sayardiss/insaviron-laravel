@extends('layouts.app')

{{-- Partie pour gérer deux vues en une (éditer et créer) --}}
@php
  // if (!isset($oldResult))
  if (isset($edit)) {
    $action = ['ResultsController@update', $oldResult->id];
    $method = 'PUT';
  } else {
    $oldResult = new App\Result;
    $edit = FALSE;
    $action = 'ResultsController@store';
    $method = 'POST';
  }
@endphp

@section('title')
  @if($edit)
    Édition d'un sponsor
  @else
    Création d'un sponsor
  @endif
@stop

@section('content')
  {{-- <a href="{{ route('home') }}" class="btn btn-default">Retour</a> --}}

  {!! Form::open(['action' => $action, 'method' => $method]) !!}
    {{-- Nom du sponsor --}}
    <div class="form-group">
      {{Form::label('name', 'Nom de l\'évenement')}}
      {{Form::text('name', $oldResult->name, ['class' => 'form-control', 'placeholder' => 'Nom'])}}
    </div>

    {{-- Année --}}
    <div class="form-group">
      {{Form::label('year', 'Édition')}}
      {{Form::number('year', date('Y'))}}
    </div>

    {{-- Description --}}
    <div class="form-group">
      {{Form::label('description', 'Description de l\'évenement et résultat')}}
      {{Form::textarea('description', $oldResult->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>

    {{Form::submit( ($edit) ? 'Éditer' : 'Créer' , ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@stop

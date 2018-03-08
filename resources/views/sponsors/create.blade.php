@extends('layouts.app')

{{-- Partie pour gérer deux vues en une (éditer et créer) --}}
@php
  // if (!isset($oldSponsor))
  if (isset($edit)) {
    $action = ['SponsorsController@update', $oldSponsor->id];
    $method = 'PUT';
  } else {
    $oldSponsor = new App\Sponsor;
    $edit = FALSE;
    $action = 'SponsorsController@store';
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
      {{Form::label('name', 'Nom du sponsor')}}
      {{Form::text('name', $oldSponsor->name, ['class' => 'form-control', 'placeholder' => 'Nom'])}}
    </div>

    {{-- Description --}}
    <div class="form-group">
      {{Form::label('description', 'Petite description')}}
      {{Form::textarea('description', $oldSponsor->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>

    {{-- Lien FB --}}
    <div class="form-group">
      {{Form::label('fb', 'Lien Facebook' )}}
      {{Form::text('fb', $oldSponsor->link_fb, ['class' => 'form-control', 'placeholder' => 'Lien'])}}
    </div>

    {{-- Site web --}}
    <div class="form-group">
      {{Form::label('web', 'Lien vers la page web du sponsor')}}
      {{Form::text('web', $oldSponsor->link_web, ['class' => 'form-control', 'placeholder' => 'Lien'])}}
    </div>

    {{-- Photo --}}
    <div class="form-group">
      {{Form::label('pic', 'Lien vers une photo')}}
      {{Form::text('pic', $oldSponsor->pathPic, ['class' => 'form-control', 'placeholder' => 'Lien'])}}
    </div>

    {{Form::submit( ($edit) ? 'Éditer' : 'Créer' , ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@stop

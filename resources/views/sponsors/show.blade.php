@extends('layouts.app')

@section('title')
    Sponsor
@stop

@section('content')
      <div class="container">
        DATA BRUTES DU SPONSOR - page pour les liens
        <br />
        {{ $sponsor }}
        <br />
        <a href="{{ route('home') }}" class="btn btn-default">Retour</a>
          <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-default">Edit</a>
          {{-- <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-default">Delete</a> --}}
          {{-- Insertion du bouton pour aller au controlleur destroy --}}
          {!! Form::open(['action' => ['SponsorsController@destroy', $sponsor->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {!! Form::close() !!}

      </div><!--/.container-->
@stop

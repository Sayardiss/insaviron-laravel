@extends('layouts.app')

@section('title')
    Result
@stop

@section('content')
      <div class="container">
        DATA BRUTES DU RESULTAT - page pour les liens
        <br />
        {{ $result }}
        <br />
        <a href="{{ route('home') }}" class="btn btn-default">Retour</a>
          <a href="{{ route('results.edit', $result->id) }}" class="btn btn-default">Edit</a>
          {{-- <a href="{{ route('results.edit', $result->id) }}" class="btn btn-default">Delete</a> --}}
          {{-- Insertion du bouton pour aller au controlleur destroy --}}
          {!! Form::open(['action' => ['ResultsController@destroy', $result->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Supprimer ?');"])}}
          {!! Form::close() !!}

      </div><!--/.container-->
@stop

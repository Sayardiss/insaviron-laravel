@extends('layouts.app')

@section('title')
    Création d'une news ou programmation
@stop

@section('content')
  <a href="{{ route('news.index') }}" class="btn btn-default">Retour</a>

  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('body', 'Body')}}
      {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body'])}}
    </div>
    <div class="form-group">
      {{Form::label('pdf', 'Nom du fichier PDF (si existant)')}}
      {{Form::textarea('pdf', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'toulouse_2018.pdf'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@stop

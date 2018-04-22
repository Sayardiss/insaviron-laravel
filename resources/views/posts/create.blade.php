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

    <div class="btn-group btn-group-toggle form-group" data-toggle="buttons">
      <label class="btn btn-secondary">
        {{Form::label('new', 'News')}}
        {{Form::radio('isProgram', '0')}}
        {{-- <input type="radio" name="program" id="option2" autocomplete="off"> News --}}
      </label>
      <label class="btn btn-secondary active">
        {{Form::label('program', 'Programmation')}}
        {{Form::radio('isProgram', '1')}}
        {{-- <input type="radio" name="program" id="program" autocomplete="off" checked> Programmation --}}
      </label>
    </div>
    <br>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@stop

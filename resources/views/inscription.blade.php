@extends('layouts.app')

@section('title')
    Inscription
@stop

@section('content')
<div class="panel panel-info">
	<div class="panel-heading">Inscription d'une équipe</div>
	<div class="panel-body">
		{!! Form::open(['url' => 'inscription', 'files' => true]) !!}
      <!-- Nom du responsable -->
      <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
				{!! Form::text('nom_respo', null, ['class' => 'form-control', 'placeholder' => 'Nom du responsable de l\'équipe']) !!}
				{!! $errors->first('nom_respo', '<small class="help-block">:message</small>') !!}
			</div>

      <!-- Adresse de l'école -->
      <div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
        {!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Adresse de l\'école de l\'équipe']) !!}
        {!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
      </div>

      <!-- Mail respo -->
			<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
				{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
			</div>

      <!-- Numéro de telephone -->
      <div class="form-group {!! $errors->has('numero') ? 'has-error' : '' !!}">
        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numéro de téléphone du responsable']) !!}
        {!! $errors->first('numero', '<small class="help-block">:message</small>') !!}
      </div>

      <!-- Selection du nombre de bateaux -->
      <div class="container">
        <h2>Nombre de bateaux par catégorie (3 bateaux par catégorie au maximum)</h2>
        <div class="list-group row">
          <div class="col-md-2">
            <a href="#" class="list-group-item">
              <label for="4_fem"><h4 class="list-group-item-heading">4x féminin</h4></label>
              {{ Form::selectRange('4_fem', 0, 3, 0, ['class' => 'boat_select form-control']) }}
            </a>
            <a href="#" class="list-group-item">
              <label for="8_fem"><h4 class="list-group-item-heading">8- féminin</h4></label>
              {{ Form::selectRange('8_fem', 0, 3, 0, ['class' => 'boat_select form-control']) }}
            </a>
          </div>

          <div class="col-md-2">
            <a href="#" class="list-group-item">
              <label for="4_mal"><h4 class="list-group-item-heading">4x masculin</h4></label>
              {{ Form::selectRange('4_mal', 0, 3, 0, ['class' => 'boat_select form-control']) }}
            </a>
            <a href="#" class="list-group-item">
              <label for="8_mal"><h4 class="list-group-item-heading">8- masculin</h4></label>
              {{ Form::selectRange('8_mal', 0, 3, 0, ['class' => 'boat_select form-control']) }}
            </a>
          </div>

          <div class="col-md-2">
            <a href="#" class="list-group-item">
              <label for="4_mix"><h4 class="list-group-item-heading">4x mixte</h4></label>
              {{ Form::selectRange('4_mix', 0, 3, 0, ['class' => 'boat_select form-control']) }}
            </a>
            <a href="#" class="list-group-item">
              <label for="8_mix"><h4 class="list-group-item-heading">8- mixte</h4></label>
              {{ Form::selectRange('8_mix', 0, 3, 0, ['class' => 'boat_select form-control']) }}
            </a>
          </div>
        </div>
      </div>

      <!-- Section upload du fichier -->
      <div class="col-md-12">
        <h2>Veuillez déposer une feuille Excel pour la composition des équipes</h2>

        <a href="{{ URL::asset('inscription.xls') }}">
          <label class="btn btn-primary">
          Téléchargez ici le template
          </label>
        </a>

        <div class="form-group {!! $errors->has('xls') ? 'has-error' : '' !!}">
          <label class="btn btn-primary">
            Uploader une feuille Excel...
            {!! Form::file('xls', ['class' => 'form-control', 'style'=>'display:none;']) !!}
    				{!! $errors->first('xls', '<small class="help-block">:message</small>') !!}
          </label>
        </div>
			</div>

			<div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
				{!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Précisions pour l\'organisateur']) !!}
				{!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
			</div>

			{!! Form::submit('Valider l\'inscription', ['class' => 'btn btn-info pull-right']) !!}
		{!! Form::close() !!}
	</div>
</div>
@endsection

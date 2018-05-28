@extends('layouts.app')

@section('title')
    Programmation, résultats et news
@stop

@section('content')
  <section {{--id="middle"--}} class="fadeInDown">
      <div class="container">

        <div class="wow fadeInDown">
          <div class="row">

          <div class="col-sm-6">
          {{-- Partie programmation --}}
          <div class="accordion">
            <h2>Programmation</h2>
            <div class="panel-group" id="accordion1">
              @if(count($programs) > 0)
                @foreach($programs as $key => $program)
                  <!-- Chaque ligne -->
                  <div class="panel panel-default">
                    {{-- Titre --}}
                    <div class="panel-heading {{ ($key == 0) ? 'active' : '' }}">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$program->id}}">
                          {{ $program->title }}
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>

                    {{-- Contenu, program->id est pour le JS --}}
                    <div id="collapse{{$program->id}}" class="panel-collapse collapse {{ ($key == 0) ? 'in' : '' }}">
                      <div class="panel-body">
                          <div class="media accordion-inner">
                            {{-- Gérer la gestion d'images si pathPic est défini --}}
                            @if($program->pathPic)
                              <div class="pull-left">
                                <img class="img-responsive" src="{{ URL::asset($program->pathPic) }}">
                              </div>
                            @endif

                            <div class="media-body">
                              {{-- !! pour ne pas échapper les balises --}}
                              {!! markdownToHtml($program->body) !!}

                              {{-- Section pour le téléchargement du PDF --}}
                              @if($program->pdf)
                                <a href="{{ URL::asset('pdf/'.$program->pdf) }}" class="btn btn-default">Télécharger le PDF de la programmation</a>
                              @endif

                              <p>Écrit le {{$program->created_at}}</p>

                              {{-- Administration de l'entrée --}}
                              @auth
                                <hr />
                                <a href="{{ route('news.edit', $program->id) }}" class="btn btn-default">Edit</a>
                                {{-- <a href="{{ route('news.edit', $program->id) }}" class="btn btn-default">Delete</a> --}}
                                {{-- Insertion du bouton pour aller au controlleur destroy --}}
                                {!! Form::open(['action' => ['PostsController@destroy', $program->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Supprimer ?');"])}}
                                {!! Form::close() !!}
                              @endauth

                            </div>
                          </div>
                      </div>
                    </div>

                  </div>
                @endforeach
              @endif
            </div><!--/#accordion1-->
          </div><!--/#accordion-->

          </div>

          <div class="col-sm-6">

          {{-- Partie news --}}
          <div class="accordion">
            <h2>News</h2>
            <div class="panel-group" id="accordion1">
              @if(count($news) > 0)
                @foreach($news as $key => $new)
                  <!-- Chaque ligne -->
                  <div class="panel panel-default">
                    {{-- Titre --}}
                    <div class="panel-heading {{ ($key == 0) ? 'active' : '' }}">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$new->id}}">
                          {{ $new->title }}
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>

                    {{-- Contenu, new->id est pour le JS --}}
                    <div id="collapse{{$new->id}}" class="panel-collapse collapse {{ ($key == 0) ? 'in' : '' }}">
                      <div class="panel-body">
                          <div class="media accordion-inner">
                            {{-- Gérer la gestion d'images si pathPic est défini --}}
                            @if($new->pathPic)
                              <div class="pull-left">
                                <img class="img-responsive" src="{{ URL::asset($new->pathPic) }}">
                              </div>
                            @endif

                            <div class="media-body">
                              {{-- !! pour ne pas échapper les balises --}}
                              {!! markdownToHtml($new->body) !!}

                              {{-- Section pour le téléchargement du PDF --}}
                              @if($new->pdf)
                                <a href="{{ URL::asset('pdf/'.$new->pdf) }}" class="btn btn-default">Télécharger le PDF de la news</a>
                              @endif

                              <p>Écrit le {{$new->created_at}}</p>

                              {{-- Administration de l'entrée --}}
                              @auth
                                <hr />
                                <a href="{{ route('news.edit', $new->id) }}" class="btn btn-default">Edit</a>
                                {{-- <a href="{{ route('news.edit', $new->id) }}" class="btn btn-default">Delete</a> --}}
                                {{-- Insertion du bouton pour aller au controlleur destroy --}}
                                {!! Form::open(['action' => ['PostsController@destroy', $new->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Supprimer ?');"])}}
                                {!! Form::close() !!}
                              @endauth

                            </div>
                          </div>
                      </div>
                    </div>

                  </div>
                @endforeach
              @endif
            </div><!--/#accordion1-->
          </div><!--/#accordion-->

          <hr />

          {{-- Partie résultats --}}
          @if(count($results) > 0)
            <div class="accordion">
              <h2>Résulats</h2>
              <div class="panel-group" id="accordion2">

                @foreach($results as $key => $result)
                  <!-- Chaque ligne -->
                  <div class="panel panel-default">
                    {{-- Titre --}}
                    <div class="panel-heading {{ ($key == 0) ? 'active' : '' }}">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseResult{{$result->id}}">
                          {{ $result->name }}
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>

                    {{-- Contenu, result->id est pour le JS --}}
                    <div id="collapseResult{{$result->id}}" class="panel-collapse collapse">
                      <div class="panel-body">
                          <div class="media accordion-inner">
                            <div class="media-body">
                              {{-- !! pour ne pas échapper les balises --}}

                              {!! markdownToHtml($result->description) !!}

                              {{-- Section pour le téléchargement du PDF --}}
                              @if($result->pdf)
                                <a href="{{ URL::asset('pdf/'.$result->pdf) }}" class="btn btn-default">Télécharger le PDF du résultat</a>
                              @endif

                              <p>Écrit le {{$result->created_at}}</p>

                              {{-- Administration de l'entrée --}}
                              @auth
                                <hr />
                                <a href="{{ route('results.edit', $result->id) }}" class="btn btn-default">Edit</a>
                                {{-- <a href="{{ route('news.edit', $result->id) }}" class="btn btn-default">Delete</a> --}}
                                {{-- Insertion du bouton pour aller au controlleur destroy --}}
                                {!! Form::open(['action' => ['SponsorsController@destroy', $result->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Supprimer ?');"])}}
                                {!! Form::close() !!}
                              @endauth

                            </div>
                          </div>
                      </div>
                    </div>

                  </div>
                @endforeach
                {{-- Pagination --}}
                {{-- {{ $posts->links() }} --}}

              </div><!--/#accordion2-->
            </div><!--/#accordion-->
              @endif
            </div>

        </div>



        </div><!--/#wow-->

      </div><!--/.container-->
  </section><!--/#middle-->
@stop

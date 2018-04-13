@extends('layouts.app')

@section('title')
    Programmation, résultats et news
@stop

@section('content')
  <section {{--id="middle"--}} class="fadeInDown">
      <div class="container">

        <div class="wow fadeInDown">
          {{-- Partie programmation et news --}}
          <div class="accordion">
            <h2>Programmation et news</h2>
            <div class="panel-group" id="accordion1">

              @if(count($posts) > 0)
                @foreach($posts as $key => $post)
                  <!-- Chaque ligne -->
                  <div class="panel panel-default">
                    {{-- Titre --}}
                    <div class="panel-heading {{ ($key == 0) ? 'active' : '' }}">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$post->id}}">
                          {{ $post->title }}
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>

                    {{-- Contenu, post->id est pour le JS --}}
                    <div id="collapse{{$post->id}}" class="panel-collapse collapse {{ ($key == 0) ? 'in' : '' }}">
                      <div class="panel-body">
                          <div class="media accordion-inner">
                            {{-- Gérer la gestion d'images si pathPic est défini --}}
                            @if($post->pathPic)
                              <div class="pull-left">
                                <img class="img-responsive" src="{{ URL::asset($post->pathPic) }}">
                              </div>
                            @endif

                            <div class="media-body">
                              {{-- !! pour ne pas échapper les balises --}}
                              {!! markdownToHtml($post->body) !!}
                              <p>Écrit le {{$post->created_at}}</p>

                              {{-- Administration de l'entrée --}}
                              @auth
                                <hr />
                                <a href="{{ route('news.edit', $post->id) }}" class="btn btn-default">Edit</a>
                                {{-- <a href="{{ route('news.edit', $post->id) }}" class="btn btn-default">Delete</a> --}}
                                {{-- Insertion du bouton pour aller au controlleur destroy --}}
                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
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
              @else
                <p>Pour l'instant, il n'y a pas d'article !</p>
              @endif

            </div><!--/#accordion1-->
          </div><!--/#accordion-->

          <hr />

          {{-- Partie résultats --}}
          <div class="accordion">
            <h2>Résulats</h2>
            <div class="panel-group" id="accordion2">

              @if(count($results) > 0)
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
              @else
                <p>Pour l'instant, il n'y a pas de résultat</p>
              @endif

            </div><!--/#accordion2-->
          </div><!--/#accordion-->



        </div><!--/#wow-->

      </div><!--/.container-->
  </section><!--/#middle-->
@stop

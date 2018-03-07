@extends('template')

@section('titre')
    Programmation, résultats et news
@stop

@section('contenu')
  <a href="{{ route('news.index') }}" class="btn btn-default">Retour</a>
  <section class="fadeInDown">
      <div class="container">

        <div class="wow fadeInDown">
          <div class="accordion">
            <h2>Programmation, résultats et news</h2>
            <div class="panel-group" id="accordion1">

              <div class="panel panel-default">
                    {{-- Titre --}}
                    <div class="panel-heading active">
                      <h3 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{$post->id}}">
                          {{ $post->title }}
                          <i class="fa fa-angle-right pull-right"></i>
                        </a>
                      </h3>
                    </div>

                    {{-- Contenu, post->id est pour le JS --}}
                    <div id="collapse{{$post->id}}" class="panel-collapse collapse in">
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
                            </div>
                          </div>
                      </div>
                    </div>

                  </div>

            </div><!--/#accordion1-->
          </div><!--/#accordion-->
          <hr />
          <a href="{{ route('news.edit', $post->id) }}" class="btn btn-default">Edit</a>
          {{-- <a href="{{ route('news.edit', $post->id) }}" class="btn btn-default">Delete</a> --}}
          {{-- Insertion du bouton pour aller au controlleur destroy --}}
          {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {!! Form::close() !!}
        </div><!--/#wow-->

      </div><!--/.container-->
  </section><!--/#middle-->
@stop

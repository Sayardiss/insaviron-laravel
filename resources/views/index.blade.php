@extends('layouts.app')

<?php use App\Sponsor; ?>

@section('title')
    @lang('messages.navbar.Main')
@stop

@section('content')

  <style>

  #holder {
    position:center;
    width:100%;
    height:100%;
    padding:5px;
  }

  #holder img {
    display: block;
    margin: auto;
    max-width:50%;

    max-height:50%;
    margin-left: auto;
    margin-right: auto;
    padding:5px;
  }

  .parallax {
      /* The image used */
      background-image: url({{URL::asset('images/parallax.jpg')}});

      /* Set a specific height */
      height: 500px;

      /* Create the parallax scrolling effect */
      margin-top : 15px;
      margin-right:30px;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
  }
  </style>



 <section id="feature" >
      <div class="container">
        <div class="parallax">
          <div id="holder">
            <img src={{URL::asset('images/RowINSA.png')}}>
          </div>
        </div>

        <div class="row">
          <div class="features">
            <div class="center wow fadeInDown">

              {{-- Informations sur l'association --}}
              <div class="center wow fadeInDown sponsor">
                  {{-- <img class="sponsorPic" src="/images/sponsors/{{$sponsor->pathPic}}" /> --}}
                  <h2>@lang('messages.description')</h2>
                  <p class="lead">@lang('messages.descriptionMain')</p>

                  {{-- Liens du sponsor --}}
                  <div class="">
                    <div class="feature-wrap">
                      <a href="https://www.facebook.com/insaviron">
                        <i class="fa fa-facebook" ></i>
                      </a>
                    </div>
                  </div>
              </div>

              {{-- Informations sur le groupe INSA --}}
              <div class="center wow fadeInDown sponsor">
                  {{-- <img class="sponsorPic" src="/images/sponsors/{{$sponsor->pathPic}}" /> --}}
                  <h2>@lang('messages.groupeINSA')</h2>
                  <p class="lead">@lang('messages.groupeINSAdes')</p>

                  {{-- Liens du sponsor --}}
                  <div class="">
                    <div class="feature-wrap">
                      <a href="https://www.facebook.com/groupeinsa">
                        <i class="fa fa-facebook" ></i>
                      </a>
                    </div>
                  </div>
                  <div class="">
                    <div class="feature-wrap">
                      <a href="https://http://www.groupe-insa.fr">
                        <i class="fa fa-sign-in" ></i>
                      </a>
                    </div>
                  </div>
              </div>

              {{-- Affichage des sponsors --}}
              @foreach (($sponsors = Sponsor::all()) as $key => $sponsor)

                {{-- Administration de l'entrée --}}
                @auth
                  <hr />
                  <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-default">Edit</a>

                  {{-- Insertion du bouton pour aller au controlleur destroy --}}
                  {!! Form::open(['action' => ['SponsorsController@destroy', $sponsor->id], 'method' => 'POST']) !!}
                      {{Form::hidden('_method', 'DELETE')}}
                      {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Supprimer ?');"])}}
                  {!! Form::close() !!}
                @endauth


                <div class="center wow fadeInDown sponsor">
                    <img class="sponsorPic" src="{{$sponsor->pathPic}}" />
                    <h2>{{ $sponsor->name }}</h2>
                    <p class="lead">{{ $sponsor->description }}</p>

                    {{-- Liens du sponsor --}}
                    <div class="">
                      @if (isset($sponsor->link_fb))
                        <div class="feature-wrap">
                          <a href="{{ $sponsor->link_fb }}">
                            <i class="fa fa-facebook" ></i>
                          </a>
                        </div>
                      @endif
                      @if (isset($sponsor->link_web))
                        <div class="feature-wrap">
                          <a href="{{ $sponsor->link_web }}">
                            <i class="fa fa-sign-in" ></i>
                          </a>
                        </div>
                      @endif
                    </div>
                </div>

              @endforeach
            </div>
          </div>
        </div>

      </div><!--/.container-->
  </section><!--/#feature-->
@stop

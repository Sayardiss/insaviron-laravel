@extends('layouts.app')

<?php use App\Sponsor; ?>

@section('title')
    Accueil
@stop

@section('content')
 <section id="feature" >
      <div class="container">


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
                      {{-- <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-default">Delete</a> --}}
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

 {{-- <section id="recent-works">
      <div class="container">
          <div class="center wow fadeInDown">
              <h2>Recent Works</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
          </div>

          <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item1.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">Business theme</a> </h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item1.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item2.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">Business theme</a></h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item2.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item3.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">Business theme </a></h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item3.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item4.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">MultiPurpose theme </a></h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item4.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item5.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">Business theme</a></h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item5.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item6.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">Business theme </a></h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item6.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item7.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">Business theme </a></h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item7.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-3">
                  <div class="recent-work-wrap">
                      <img class="img-responsive" src="images/portfolio/recent/item8.png" alt="">
                      <div class="overlay">
                          <div class="recent-work-inner">
                              <h3><a href="#">Business theme </a></h3>
                              <p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <a class="preview" href="images/portfolio/full/item8.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div><!--/.row-->
      </div><!--/.container-->
  </section><!--/#recent-works-->

  <section id="middle">
      <div class="container">
          <div class="row">
              <div class="col-sm-6 wow fadeInDown">
                  <div class="skill">
                      <h2>Our Skills</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                      <div class="progress-wrap">
                          <h3>Graphic Design</h3>
                          <div class="progress">
                            <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                              <span class="bar-width">85%</span>
                            </div>

                          </div>
                      </div>

                      <div class="progress-wrap">
                          <h3>HTML</h3>
                          <div class="progress">
                            <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                             <span class="bar-width">95%</span>
                            </div>
                          </div>
                      </div>

                      <div class="progress-wrap">
                          <h3>CSS</h3>
                          <div class="progress">
                            <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                              <span class="bar-width">80%</span>
                            </div>
                          </div>
                      </div>

                      <div class="progress-wrap">
                          <h3>Wordpress</h3>
                          <div class="progress">
                            <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                              <span class="bar-width">90%</span>
                            </div>
                          </div>
                      </div>
                  </div>

              </div><!--/.col-sm-6-->

              <div class="col-sm-6 wow fadeInDown">
                  <div class="accordion">
                      <h2>Why People like us?</h2>
                      <div class="panel-group" id="accordion1">
                        <div class="panel panel-default">
                          <div class="panel-heading active">
                            <h3 class="panel-title">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                Lorem ipsum dolor sit amet
                                <i class="fa fa-angle-right pull-right"></i>
                              </a>
                            </h3>
                          </div>

                          <div id="collapseOne1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="media accordion-inner">
                                      <div class="pull-left">
                                          <img class="img-responsive" src="images/accordion1.png">
                                      </div>
                                      <div class="media-body">
                                           <h4>Adipisicing elit</h4>
                                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                                      </div>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                Lorem ipsum dolor sit amet
                                <i class="fa fa-angle-right pull-right"></i>
                              </a>
                            </h3>
                          </div>
                          <div id="collapseTwo1" class="panel-collapse collapse">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
                                Lorem ipsum dolor sit amet
                                <i class="fa fa-angle-right pull-right"></i>
                              </a>
                            </h3>
                          </div>
                          <div id="collapseThree1" class="panel-collapse collapse">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1">
                                Lorem ipsum dolor sit amet
                                <i class="fa fa-angle-right pull-right"></i>
                              </a>
                            </h3>
                          </div>
                          <div id="collapseFour1" class="panel-collapse collapse">
                            <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                            </div>
                          </div>
                        </div>
                      </div><!--/#accordion1-->
                  </div>
              </div>

          </div><!--/.row-->
      </div><!--/.container-->
  </section><!--/#middle--> --}}

<!-- garbage02 -->

<!-- garbage01 -->
@stop

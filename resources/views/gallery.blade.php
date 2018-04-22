@extends('layouts.app')

@section('title')
    Gallerie
@stop

@section('content')

{{-- Partie Slider --}}
<div class="slider">
  <div class="container">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
          <ol class="carousel-indicators visible-xs">
            <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-slider" data-slide-to="1"></li>
            <li data-target="#carousel-slider" data-slide-to="2"></li>
          </ol>


        <div class="carousel-inner">
          @foreach(File::allFiles("images/slide_gallery") as $key => $file)
            <div class="item {{ ($key == 0) ? 'active' : '' }}">
              {{-- {{ HTML::image($file, 'alt text', array('class' => 'img-responsive')) }} --}}
              <img src="{{ URL::asset($file) }}" alt="{{ pathinfo($file, PATHINFO_FILENAME) }}" class="img-responsive">
            </div>
          @endforeach
        </div>

        <!-- Boutons droite/gauche -->
        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>

      </div> <!--/#carousel-slider-->
    </div><!--/#about-slider-->
  </div>
</div>

  @php
    $folder = 'images/gallery/' . Request::route('folder');
    if (!File::isDirectory($folder)){
      header("Location: .");
      die();
    }
  @endphp


{{-- Affichage des miniatures --}}
<div align="center">

  {{-- Lien vers les dossiers --}}
  <div class="container">
    @foreach(glob('images/gallery/*', GLOB_ONLYDIR ) as $dir)
      <a href="{{route('gallery', [basename($dir)])}}" class="btn btn-default" role="button">{{basename($dir)}}</a>
    @endforeach
  </div>

  {{-- Miniatures --}}
  <ul class="list-inline">
  @foreach(File::allFiles($folder) as $key => $file)
    <li>
      <li data-toggle="modal" data-target="#myModal">
        <a href="#myGallery" data-slide-to="{{ $key }}"><img class="img-thumbnail" src="{{ URL::asset($file) }}"><br />
          {{-- {{ pathinfo($file, PATHINFO_FILENAME) }} --}}
        </a>
      </li>
    </li>
  @endforeach
  </ul>
</div>

<!--begin modal window-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <div class="pull-left">My Gallery Title</div> -->
        <!-- <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button> -->
      </div>

      <div class="modal-body">
        <!--begin carousel-->
        <div id="myGallery" class="carousel slide" data-interval="false">
          <div class="carousel-inner">
            @foreach(File::allFiles($folder) as $key => $file)
              <div class="item {{ ($key == 0) ? 'active' : '' }}"> <img src="{{ URL::asset($file) }}" alt="{{ pathinfo($file, PATHINFO_FILENAME) }}">
                <div class="carousel-caption">
                  <h2>{{ pathinfo($file, PATHINFO_FILENAME) }}</h2>
                  {{-- <p>DESCRIPTION X</p> --}}
                </div>
              </div>
            @endforeach
          </div><!--end carousel-inner-->

          <!--Begin Previous and Next buttons-->
          <a class="left carousel-control" href="#myGallery" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myGallery" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div><!--end carousel-->
      </div>  <!--end modal-body-->

      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
        <!-- <button class="btn-sm close" type="button" data-dismiss="modal">Close</button> -->
      </div><!--end modal-footer-->
    </div><!--end modal-content-->
  </div><!--end modal-dialoge-->
</div><!--end myModal-->
@stop

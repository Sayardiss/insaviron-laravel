@extends('layouts.app')

@section('title')
    Gallerie
@stop

@section('content')
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
          <div class="item active">
            <img src="images/slider_one.jpg" class="img-responsive" alt="">
           </div>
           <div class="item">
            <img src="images/gallery/gallery1.jpg" class="img-responsive" alt="">
           </div>
           <div class="item">
            <img src="images/gallery/gallery2.jpg" class="img-responsive" alt="">
           </div>
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



<div align="center">
  <ul class="list-inline">
  @foreach(File::allFiles("images/gallery") as $key => $file)
    <li>
      <li data-toggle="modal" data-target="#myModal">
        <a href="#myGallery" data-slide-to="{{ $key }}"><img class="img-thumbnail" src="{{$file}}"><br />
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
            @foreach(File::allFiles("images/gallery") as $key => $file)
              <div class="item {{ ($key == 0) ? 'active' : '' }}"> <img src="{{$file}}" alt="{{ pathinfo($file, PATHINFO_FILENAME) }}">
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


{{-- <div align="center">

  <ul class="list-inline">
    <li data-toggle="modal" data-target="#myModal"><a href="#myGallery" data-slide-to="0"><img class="img-thumbnail" src="https://placeimg.com/200/133/nature/1"><br>
  Photo X</a></li>
    <li data-toggle="modal" data-target="#myModal"><a href="#myGallery" data-slide-to="1"><img class="img-thumbnail" src="https://placeimg.com/200/133/nature/2"><br>
  Photo X</a></li>
    <li data-toggle="modal" data-target="#myModal"><a href="#myGallery" data-slide-to="2"><img class="img-thumbnail" src="https://placeimg.com/200/133/nature/3"><br>
  Photo X</a></li>
    <li data-toggle="modal" data-target="#myModal"><a href="#myGallery" data-slide-to="3"><img class="img-thumbnail" src="https://placeimg.com/200/133/nature/4"><br>
  Photo X</a></li>
    <li data-toggle="modal" data-target="#myModal"><a href="#myGallery" data-slide-to="4"><img class="img-thumbnail" src="https://placeimg.com/200/133/nature/5"><br>
  Photo X</a></li>
    <li data-toggle="modal" data-target="#myModal"><a href="#myGallery" data-slide-to="5"><img class="img-thumbnail" src="https://placeimg.com/200/133/nature/6"><br>
  Photo X</a></li>
  </ul>

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
              <div class="item active"> <img src="https://placeimg.com/600/400/nature/1" alt="item0">
                <div class="carousel-caption">
                  <h3>TITRE X</h3>
                  <p>DESCRIPTION X</p>
                </div>
              </div>
                <div class="item"> <img src="https://placeimg.com/600/400/nature/2" alt="item1">
                <div class="carousel-caption">
                  <h3>TITRE X</h3>
                  <p>DESCRIPTION X</p>
                </div>
              </div>
              <div class="item"> <img src="https://placeimg.com/600/400/nature/3" alt="item2">
                <div class="carousel-caption">
                  <h3>TITRE X</h3>
                  <p>DESCRIPTION X</p>
                </div>
              </div>
              <div class="item"> <img src="https://placeimg.com/600/400/nature/4" alt="item3">
                <div class="carousel-caption">
                  <h3>TITRE X</h3>
                  <p>DESCRIPTION X</p>
                </div>
              </div>
              <div class="item"> <img src="https://placeimg.com/600/400/nature/5" alt="item4">
                <div class="carousel-caption">
                  <h3>TITRE X</h3>
                  <p>DESCRIPTION X</p>
                </div>
              </div>
              <div class="item"> <img src="https://placeimg.com/600/400/nature/6" alt="item5">
                <div class="carousel-caption">
                  <h3>TITRE X</h3>
                  <p>DESCRIPTION X</p>
                </div>
              </div>
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
</div> --}}
@stop

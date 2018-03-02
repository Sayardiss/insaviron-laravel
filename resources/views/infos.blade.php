@extends('template')

@section('titre')
    Infos pratiques
@stop

@section('contenu')
<section>
  <div class="map fadeInDown">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10872.479923688674!2d2.3962882!3d47.0574967!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7278fd07015fc78c!2sBase+de+Voile+du+Val+d&#39;Auron!5e0!3m2!1sfr!2sfr!4v1519764427844" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</section>

<section id="feature" >
      <div class="container">
         <div class="center wow fadeInDown">
              <h2>Lieux et horaires</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
          </div>

          <div class="row">
              <div class="features">
                  <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="feature-wrap">
                          <i class="fa fa-laptop"></i>
                          <h2>Fresh and Clean</h2>
                          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                      </div>
                  </div><!--/.col-md-4-->

                  <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="feature-wrap">
                          <i class="fa fa-comments"></i>
                          <h2>Retina ready</h2>
                          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                      </div>
                  </div><!--/.col-md-4-->

                  <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="feature-wrap">
                          <i class="fa fa-cloud-download"></i>
                          <h2>Easy to customize</h2>
                          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                      </div>
                  </div><!--/.col-md-4-->

                  <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="feature-wrap">
                          <i class="fa fa-leaf"></i>
                          <h2>Adipisicing elit</h2>
                          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                      </div>
                  </div><!--/.col-md-4-->

                  <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="feature-wrap">
                          <i class="fa fa-cogs"></i>
                          <h2>Sed do eiusmod</h2>
                          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                      </div>
                  </div><!--/.col-md-4-->

                  <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                      <div class="feature-wrap">
                          <i class="fa fa-heart"></i>
                          <h2>Labore et dolore</h2>
                          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                      </div>
                  </div><!--/.col-md-4-->
              </div><!--/.services-->
          </div><!--/.row-->
      </div><!--/.container-->
  </section><!--/#feature-->
@stop

<!DOCTYPE html>
<!-- <html lang="fr"> -->
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      INSAviron - @yield('titre')
    </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="homepage">

    <!-- Menu principal   -->
    <header id="header">
      <nav class="navbar navbar-fixed-top" role="banner">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ route('home') }}">INSAviron</a>
              </div>

              <div class="collapse navbar-collapse navbar-right">
                  <ul class="nav navbar-nav">
                      <li class="{{ isActiveRoute('home') }}"><a href="{{ route('home') }}">Accueil</a></li>
                      <li class="{{ isActiveRoute('about-us') }}"><a href="{{ route('about-us') }}">À propos</a></li>
                      <li class="{{ isActiveRoute('infos') }}"><a href="{{ route('infos') }}">Infos pratiques</a></li>
                      <li class="{{ isActiveRoute('inscription') }}"><a href="{{ route('inscription') }}">Inscription</a></li>
                      <li class="{{ isActiveRoute('news') }}"><a href="{{ route('news') }}">Programmation, résultats et news</a></li>
                      <li class="{{ isActiveRoute('gallery') }}"><a href="{{ route('gallery') }}">Gallerie</a></li>
                      <li class="{{ isActiveRoute('contact') }}"><a href="{{ route('contact') }}">Contact</a></li>
                  </ul>
              </div>
          </div><!--/.container-->
      </nav><!--/nav-->
    </header><!--/header-->

    <!-- Contenu principal de la page -->
    <div id="wrap">
      <div id="main" class="container clear-top">
        @yield('contenu')
      </div>
    </div>

    <!-- Footer. Faites comme vous le sentez pour le lien bootstraptaste ! -->
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="http://bootstraptaste.com/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">bootstraptaste</a>. All Rights Reserved.
                </div>
                <!--
                    All links in the footer should remain intact.
                    Licenseing information is available at: http://bootstraptaste.com/license/
                    You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Gp
                -->
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="https://iris-insa.com/">Made with ♥ by Iris INSA</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

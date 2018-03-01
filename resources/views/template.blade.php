<!DOCTYPE html>
<!-- <html lang="fr"> -->
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      @yield('title')
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

    <!-- Menu à généraliser   -->
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
                  <a class="navbar-brand" href="index.html">INSAviron</a>
              </div>

              <div class="collapse navbar-collapse navbar-right">
                  <ul class="nav navbar-nav">
                      <li class="{{ isActiveRoute('home') }}"><a href="{{ route('home') }}">Accueil</a></li>
                      <li><a href="about-us.html">À propos</a></li>
                      <li><a href="services.html">Infos pratiques</a></li>
                      <li><a href="blog.html">Inscription</a></li>
                      <li><a href="portfolio.html">Programmation, résultats et news</a></li>
                      <li><a href="portfolio.html">Gallerie</a></li>
                      <li><a href="contact-us.html">Contact</a></li>
                  </ul>
              </div>
          </div><!--/.container-->
      </nav><!--/nav-->
    </header><!--/header-->

	  @yield('contenu')

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

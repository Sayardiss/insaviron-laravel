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
                  <li class="{{ isActiveRoute('news.index') }}"><a href="{{ route('news.index') }}">Programmation, résultats et news</a></li>
                  <li class="{{ isActiveRoute('gallery') }}"><a href="{{ route('gallery') }}">Gallerie</a></li>
                  <li class="{{ isActiveRoute('contact') }}"><a href="{{ route('contact') }}">Contact</a></li>
              </ul>
          </div>
      </div><!--/.container-->
  </nav><!--/nav-->
</header><!--/header-->

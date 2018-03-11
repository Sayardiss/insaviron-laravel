<header id="header">
  <nav class="navbar navbar-fixed-top" role="banner">
      {{-- <div class="container">
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
  </nav><!--/nav--> --}}


{{-- INCLUSION DU MAKEAUTH --}}


    {{-- <nav class="navbar navbar-default navbar-static-top"> --}}
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <ul class="nav navbar-nav">
                    <li class="{{ isActiveRoute('home') }}"><a href="{{ route('home') }}">Accueil</a></li>
                    {{-- <li class="{{ isActiveRoute('about-us') }}"><a href="{{ route('about-us') }}">À propos</a></li> --}}
                    <li class="{{ isActiveRoute('infos') }}"><a href="{{ route('infos') }}">Infos pratiques</a></li>
                    <li class="{{ isActiveRoute('inscription') }}"><a href="{{ route('inscription') }}">Inscription</a></li>
                    <li class="{{ isActiveRoute('news.index') }}"><a href="{{ route('news.index') }}">Programmation, résultats et news</a></li>
                    <li class="{{ isActiveRoute('gallery') }}"><a href="{{ route('gallery') }}">Gallerie</a></li>
                    <li class="{{ isActiveRoute('contact') }}"><a href="{{ route('contact') }}">Contact</a></li>
                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        {{-- Pas de proposition de login --}}
                        {{-- <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li> --}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                  <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>

                {{-- Menu des langues --}}
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/images/flags/{{ Config::get('flags')[App::getLocale()] }}.png" alt="{{ Config::get('languages')[App::getLocale()] }}"/>
                        {{-- Texte --}}
                        {{-- {{ Config::get('languages')[App::getLocale()] }} --}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}">
                                      <img src="/images/flags/{{ Config::get('flags')[$lang] }}.png" alt="{{$language}}"/>
                                    </a>
                                    {{-- <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a> --}}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
              </ul>

            </div>
        </div>
    </nav>


{{-- FIN INCLUSION --}}




</header><!--/header-->

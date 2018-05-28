<header role="banner">


<nav id="navbar-primary" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-primary-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ isActiveRoute('home') }}"><a href="{{ route('home') }}">@lang('messages.navbar.Main')</a></li>
        <li class="{{ isActiveRoute('infos') }}"><a href="{{ route('infos') }}">@lang('messages.navbar.Info')</a></li>
        <li class="{{ isActiveRoute('inscription') }}"><a href="{{ route('inscription') }}">@lang('messages.navbar.Inscription')</a></li>
        <li><a href="{{ route('home') }}"><img id="logo-navbar-middle" src={{URL::asset('images/RowINSA.png')}} width="200" alt="Logo Thing main logo"></a></li>
        <li class="{{ isActiveRoute('news.index') }}"><a href="{{ route('news.index') }}">@lang('messages.navbar.News')</a></li>
        <li class="{{ isActiveRoute('gallery') }}"><a href="{{ route('gallery', []) }}">@lang('messages.navbar.Gallery')</a></li>
        <li class="{{ isActiveRoute('contact') }}"><a href="{{ route('contact') }}">@lang('messages.navbar.Contact')</a></li>


        {{-- Menu des langues --}}
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
                </li>
              @endif
            @endforeach
          </ul>
        </li>


        @auth
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
        @else
          {{-- Pas de proposition de login --}}
          {{-- <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li> --}}
        @endauth
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header><!-- header role="banner" -->

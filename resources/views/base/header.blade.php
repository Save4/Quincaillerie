<header class="topbar-nav">
  <nav class="navbar navbar-expand fixed-top gradient-forest">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link toggle-menu" href="javascript:void();">
          <i class="icon-menu menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <form class="search-bar">
          <input type="text" class="form-control" placeholder="Enter keywords">
          <a href="javascript:void();"><i class="icon-magnifier"></i></a>
        </form>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
              <!--   <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              <a class="dropdown-item" href="{{ route('users.index') }}">Liste des utilisateurs</a>
              <a class="dropdown-item" href="{{ route('roles.index') }}">Liste des roles</a>
              </div>
          </li>
      @endguest
  </ul>
  </nav>
</header>

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
    <ul class=" navbar-right">
                      <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
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
                                     @can ('manage-users')
                                     <a class="dropdown-item" href="{{ route('users.index') }}">Liste des utilisateurs</a>
                                     @endcan
                                     @can ('manage-roles')
                                     <a class="dropdown-item" href="{{ route('roles.index') }}">Liste des roles</a>
                                     
                                     @endcan
                                    </div>
                                </li>

                    </ul>
  </nav>
</header>

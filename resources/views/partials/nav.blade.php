<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">
   <div class="container"> 
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name')}}
        </a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}" href="{{ route('home') }}">@lang('Home')</a></li>
                <li class="nav-item">
                    <a  class="nav-link {{ setActive('about') }} " href="{{ route('about') }}"> @lang('About')</a></li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('contact') }}" href="{{ route('contact') }}"> @lang('Contact')</a></li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('projects.*') }}" href="{{ route('projects.index') }}"> @lang('Projects')</a></li>
                @auth
                    @if(auth()->user()->isAdmin(['admin']))
                        <li class="nav-item">
                            <a class="nav-link  {{ setActive('usuarios*')}}" href="{{ route('users.index') }}">@lang('Users')</a>
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link  {{ setActive('correos*')}}" href="{{ route('emails.index') }}">@lang('Emails')</a>
                        </li>    
                    @endif    
                @endauth
                
            </ul>
        </div> 
        <div class="dropdown">
                 @guest
                
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                @else

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('users.edit', auth()->id() )}}">Mi cuenta</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Cerrar sesión
                        </a>
                    </div> 
            
                @endguest
        </div>  
    </div> 
</nav>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
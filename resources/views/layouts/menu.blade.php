<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCont" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCont" >
        <ul class="navbar-nav ml-auto">
            @if (Auth::user()->role === 'A' || Auth::user()->role === 'B')
                <li class="nav-item">
                    <a href="{!! route('user.index') !!}" class="nav-link btn btn-outline-info text-secondary" >
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('moto.index') !!}" class="nav-link btn btn-outline-info text-secondary">
                        Vehículos
                    </a>
                </li>        
                <li class="nav-item">
                    <a href="{!! route('travel.index') !!}" class="nav-link btn btn-outline-info text-secondary">
                        Transportes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home.report') }}" class="nav-link btn btn-outline-info text-secondary">
                        Reportes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.confirmed') }}" class="nav-link btn btn-outline-info text-secondary">
                        Conductores
                    </a>
                </li>
            @endif   
            @if (Auth::user()->role == 'C' ||Auth::user()->role == '')
                <li class="nav-item">
                    <a href="{!! route('location.index') !!}" class="nav-link btn btn-outline-info text-secondary">
                        Servicio
                    </a>
                    
                </li>
            @endif         
            <li hidden class="nav-item">
                <a href="{!! route('travel.map') !!}" class="nav-link btn btn-outline-info text-secondary">
                    mapa
                </a>
            </li>
        </ul>
    </div>
</nav>
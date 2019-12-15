<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">

            @if (Auth::user()->role === 'A' || Auth::user()->role === 'B')
                <li class="nav-item">
                    <a href="{!! route('user.index') !!}" class="nav-item btn btn-outline-info text-secondary" >
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('moto.index') !!}" class="nav-item btn btn-outline-info text-secondary">
                        Vehículos
                    </a>
                </li>        
                <li class="nav-item">
                    <a href="{!! route('travel.index') !!}" class="nav-item btn btn-outline-info text-secondary">
                        Transportes
                    </a>
                </li>
                <li hidden class="nav-item">
                    <a href="#" class="nav-item btn btn-outline-info text-secondary">Reportes</a>
                </li>
            @endif   
            <li class="nav-item">
                <a href="{!! route('location.index') !!}" class="nav-item btn btn-outline-info text-secondary">Servicio</a>
            </li>        
            <li hidden class="nav-item">
                <a href="{!! route('travel.map') !!}" class="nav-item btn btn-outline-info text-secondary">mapa</a>
            </li>
        </ul>
    </div>
</nav>
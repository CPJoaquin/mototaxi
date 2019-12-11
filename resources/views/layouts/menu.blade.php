<header id="header" >
    <div class="center" >
        <nav id="menu">
            <ul>
                @if (Auth::user()->role === 'A' || Auth::user()->role === 'B')
                    <li>
                        <a href="{!! route('user.index') !!}">Usuarios</a>
                    </li>
                    <li>
                        <a href="{!! route('moto.index') !!}">Vehículos</a>
                    </li>
                @endif
                <li>
                    <a href="{!! route('travel.index') !!}">Transporte</a>
                </li>
                <li>
                    <a href="#">Reportes</a>
                </li>
                <li>
                    <a href="{!! route('travel.map') !!}">mapa</a>
                </li>
                <li>
                    <a href="{!! route('travel.create') !!}">Solicitar transporte</a>
                </li>
                
            </ul>
        </nav>
        <div class="clearfix" ></div>
    </div>
</header>

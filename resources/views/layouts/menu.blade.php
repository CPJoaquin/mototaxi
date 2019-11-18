<header id="header" >
    <div class="center" >
        <nav id="menu">
            <ul>
                @if (Auth::user()->role === 'A' || Auth::user()->role === 'B')
                    <li>
                        <a href="{!! route('user.index') !!}">Usuarios</a>
                    </li>
                @endif
                <li>
                    <a href="#">Viajes</a>
                </li>
                <li>
                    <a href="#">Reportes</a>
                </li>
                <li>
                    <a href="#">Vehículos</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix" ></div>
    </div>
</header>

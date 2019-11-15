<header id="header" >
    <div class="center" >
        <div  id="logo">
            <img src="{{ asset('/images/logo.svg') }}" class="app-logo" alt="logotipo">
            <span id="brand" >
                <strong>Fast </strong>Moto
            </span>
        </div>
        <nav id="menu">
            <ul>
                <li>
                    <a href="{!! route('user.index') !!}">Usuarios</a>
                </li>
                <li>
                    <a href="#">Viajes</a>
                </li>
                <li>
                    <a href="#">Reportes</a>
                </li>
                <li>
                    <a href="#">Acerca</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix" ></div>
    </div>
</header>

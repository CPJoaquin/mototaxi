@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="center">
    @guest
        
        <aside id="sidebar">
        <div id="nav-blog" class="sidebar-item">
            <h3>¿Aun no probaste nuestro servicio?</h3>
            <a href="{{ route('register') }}" class="btn-outline-primary form-control">Registrarse gratis</a>
        </div>
        <div id="nav-blog" class="sidebar-item">
            <h3>inicia sesion para acceder a nuestros servicios</h3>
            <a href="{{ route('login') }}" class="btn-outline-primary form-control">Iniciar sesion</a>
        </div>
        </aside>
    @endguest
    <section id="content">
        <div id="articles">
            <article class="article-item" id="article-template">
                    <div class="image-wrap">
                        <img class="img-responsive" src="https://d2yoo3qu6vrk5d.cloudfront.net/images/20180214070909/motodomicilio-900x485.jpg?itok=1518619198" alt="moto">
                    </div>
                    <h2>Su timepo es nuestro tiempo <small> <br>Su puntualidad es la nuestra</small> </h2>
                    <br>
                    <span class="date">Velocidad, seguridad, confiabilidad, accesibilidad y puntualidad. <br> <strong> Todo lo que necesita en un solo medio de transporte</strong></span>
                    <div class="clearfix"></div>
            </article>
        </div>
    </section>
    <div class="clearfix"></div>
</div>
@endsection

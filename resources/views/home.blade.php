@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="containder text-center row">
    @guest
    <aside class="col-md-4 container ml-auto">
        <div class="container">
            <div class="container ml-auto">
                <h3>¿Aun no probaste nuestro servicio?</h3>
                <a href="{{ route('register') }}" class="btn btn-outline-primary form-control">Registrarse gratis</a>
            </div>
            <div class="container ml-auto">
                <h3>inicia sesion para acceder a nuestros servicios</h3>
                <a href="{{ route('login') }}" class="btn btn-outline-primary form-control">Iniciar sesion</a>
            </div>
        </div>
    </aside>
    @endguest
    <section class="container col-md-8">
        <div class="card container">
            <article class="row">
                <div class="col container">
                    <h2>Su tiempo es nuestro tiempo <small> <br>Su puntualidad es la nuestra</small> </h2>
                    <span class="date">Velocidad, seguridad, confiabilidad, accesibilidad y puntualidad. <br> <strong> Todo lo que necesita en un solo medio de transporte</strong></span>
                </div>
                <div class="col-12 container">
                    <img class="img-thumbnail" src="https://d2yoo3qu6vrk5d.cloudfront.net/images/20180214070909/motodomicilio-900x485.jpg?itok=1518619198" alt="moto">
                </div>
                    <div class="clearfix"></div>
            </article>
        </div>
    </section>
    <div class="clearfix"></div>
</div>
@endsection

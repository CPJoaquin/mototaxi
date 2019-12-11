@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="main container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card row">
                <div class="form-group" >
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <section>
                        <h1 class="pull-left">Registro de vehiculos</h1>
                        <div class="d-flex">
                            <a class="btn btn-primary ml-auto" style="margin-right: 5px;"
                                href="{{ route('moto.create')}}"><i class="fas fa-plus-circle"></i> Nuevo</a>
                        </div>
                        <br>
                    </section>
                    {!! Form::open(['route' => 'moto.index', 'method' => 'GET', 'class' => ''])!!}
                    <div id="form-group">
                        {!!Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar','style' =>
                        'text-transform:uppercase;',
                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();'])!!}
                    </div>
                    {!!Form::close()!!}
                    <br>
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
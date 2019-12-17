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
                        <table id="grilla" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Cliente</th>
                                    <th>Conductor</th>
                                    <th>placa</th>
                                    <th>fecha</th>
                                    <th>hora</th>
                                    <th>estado</th>
                                    <th width="50px">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($travels as $item)
                                
                                        <tr>
                                            <td>{!! $item->cliente->name !!}</td>
                                            @if (isset($item->conductor->name))
                                                <td>{!! $item->conductor->name !!}</td>
                                            @else
                                                <td>No asignado</td>
                                            @endif                                                                                        
                                            @if (isset($item->placa))
                                                <td>{{ $item->placa->placa  }}</td>
                                            @else
                                                <td>No asignado </td>
                                            @endif                                            
                                            <td>{!! $item->date!!}</td>
                                            <td>{!! $item->time!!}</td>
                                            <td>{!! $item->state!!}</td>
                                            <td class="text-center">
                                                <div id="btn-group">                                                   
                                                    <button class="btn-sm btn-primary" data-toggle="dropdown" type="button">
                                                        <span data-feather="settings"> <i class="fas fa-align-left"></i> 
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if ($item->state == 'espera')
                                                            <a href="{!! route('travel.edit', [$item->id])!!}"class="dropdown-item btn btn-warning btn-sm">
                                                                <span data-feather="list"></span> Asignar
                                                            </a>
                                                        @endif
                                                        <a href="{!! route('user.show', [$item->cliente_id])!!}"class="dropdown-item btn btn-warning btn-sm">
                                                            <span data-feather="list"></span> Ver cliente
                                                        </a>
                                                        <a href="{!! route('user.show', [$item->driver_id])!!}"class="dropdown-item btn btn-warning btn-sm">
                                                            <span data-feather="list"></span> Ver conductor
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
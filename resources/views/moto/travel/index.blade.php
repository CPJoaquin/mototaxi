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
                        <h1 class="pull-left">Registro de solicitudes de transporte</h1>
                        <br>
                    </section>
                   
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
                                                <td><strong>No asignado</strong></td>
                                            @endif                                                                                        
                                            @if (isset($item->placa))
                                                <td>{{ $item->placa->placa  }}</td>
                                            @else
                                                <td><strong>No asignado</strong> </td>
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
                                                        <a href="{!! route('travel.show', [$item->id])!!}"class="dropdown-item btn btn-warning btn-sm">
                                                            <span data-feather="list"></span> Ver solicitud
                                                        </a>
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
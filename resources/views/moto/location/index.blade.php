@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="main container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card row">
                <div class="form-group card-body" >
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <section>
                        @if (Auth::user()->role == '')
                            <h1 class="pull-left">Registro de historial de uso de nuestro servicio.</h1>
                            <div class="d-flex">
                                <a class="btn btn-primary ml-auto" style="margin-right: 5px;"
                                    href="{{ route('location.create')}}"><i class="fas fa-plus-circle"></i> Solicitar transporte</a>
                            </div>
                        @endif
                        @if (Auth::user()->role == 'C')
                        <h1 class="pull-left">Registro de servicio.</h1>
                        @endif
                        <br>
                    </section>
                    <div>
                        <table id="grilla" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    @if (Auth::user()->role == 'C')
                                        <th>Cliente</th>
                                    @else
                                        <th>conductor</th>
                                        <th>placa</th>
                                    @endif
                                    <th>fecha</th>
                                    <th>hora</th>
                                    <th>estado</th>
                                    <th width="50px">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->travels as $item)
                                
                                    <tr>
                                        @if (Auth::user()->role == 'C')
                                            <td>
                                                {!! $item->cliente['name'] !!}
                                            </td>
                                        @else
                                            <td>
                                                @if (isset($item->driver_id))
                                                    {!! $item->conductor["name"]!!}
                                                @else
                                                    <strong> En espera</strong>
                                                @endif                                            
                                            </td>
                                            <td>
                                                @if (isset($item->moto_id))
                                                    {!! $item->placa["placa"] !!}
                                                @else
                                                    <strong> En espera</strong>
                                                @endif
                                            </td>    
                                        @endif                                                                                    
                                        <td>{!! $item->date !!}</td>
                                        <td>{!! $item->time!!}</td>
                                        <td>{!! $item->state!!}</td>
                                        <td class="text-center">
                                           
                                                <div id="btn-group">
                                                    {!! Form::open(['route' => ['travel.cancel', $item->id], 'method' => 'patch']) !!}
                                                    <button class="btn-sm btn-primary" data-toggle="dropdown" type="button">
                                                        <span data-feather="settings"> <i class="fas fa-align-left"></i> 
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a href="{!! route('travel.show', [$item->id])!!}"class="dropdown-item btn btn-warning btn-sm">
                                                                <span data-feather="list"></span> Ver
                                                            </a>
                                                            @if ($item->state != 'cancelado' && $item->state != 'confirmado' && Auth::user()->role == '')
                                                                @if ( $item->state == 'en camino')
                                                                    <a href="{!! route('travel.confirm', [$item->id])!!}"class="dropdown-item btn btn-warning btn-sm" onclick="return confirm('¿Está seguro de confirmar la llegada a su destino?')">
                                                                        <span data-feather="list"></span> Confirmar
                                                                    </a>
                                                                @endif
                                                                
                                                                <button type="submit" class="dropdown-item btn btn-danger btn-sm"
                                                                    onclick="return confirm('Está seguro de eliminar este registro')"><span
                                                                        data-feather="trash-2"></span> Cancelar
                                                                </button>
                                                            @endif
                                                        </div>
                                                    {!! Form::close() !!}
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
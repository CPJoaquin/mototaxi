@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <section class="content-header">
                <br>
                <h2>Detalle de asignacion</h2>
            </section>
            <div class="card-group">
                <div class="card table-responsive">
                    <div class="card-body">
                        <h4 class="card-title d-flex">
                            Informacion de servicio
                            <a href="{!! route('location.index') !!}" class="btn btn-primary btn-sm ml-auto">
                                <i class="fas fa-arrow-alt-circle-left"></i> Atrás
                            </a>
                        </h4>
                        <br>
                        <div class="shadow p-4 mb-4 bg-white">
                            <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <td> <h5>Cliente:</h5> </td>
                                        <td> <h5>{{ $item->cliente['name'] }}</h5> </td>
                                    </tr>
                                    <tr>
                                        <td> <h5>Conductor:</h5></td>
                                        <td> <h5>{{ $item->conductor['name'] }}</h5> </td>
                                    </tr>
                                    <tr>
                                        <td> <h5>Placa de motocicleta:</h5></td>
                                        <td> <h5>{{ $item->placa['placa'] }}</h5> </td>
                                    </tr>
                                    <tr>
                                        <td><h5>Estado:</h5></td>
                                        <td><h5>{{ $item->state }}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Calle o avenida principal:</h5></td>
                                        <td><h5>{{ $item->location['primary'] }}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Calle(s) o avenida(s) secundaria(s)</h5></td>
                                        <td><h5>{{ $item->location['secondary'] }}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Descripcion de la ubicacion:</h5></td>
                                        <td><h5>{{ $item->location['description'] }}</h5></td>
                                    </tr>
                                </tbody>
                            </table>            
                                @if ($item->state == 'en camino')
                                    <a href="{!!route('user.edit', [$item->id])!!}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Confirmar
                                    </a>
                                @endif
                                @if ($item->state != 'cancelado' && $item->state != 'confirmado')
                                    <a href="{!!route('user.edit', [$item->id])!!}" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Cancelar
                                    </a>
                                @endif
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

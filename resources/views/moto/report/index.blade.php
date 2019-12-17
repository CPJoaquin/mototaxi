@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="main container">
<!--Cunetas de usuario-->
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card row">
                <div class="form-group" >
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <section class="text-center">
                        <h1 class="h1"><strong>Reportes</strong></h1>
                    </section>
                </div>
            </div>
<!--usuarios-->
            <h2>Presentacion de datos de cuentas de usuario</h2>
            <div class="card-row">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3 class="m-b-40">Rporte de usuarios</h3>
                                <canvas id="userRep"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3>Detalle de cuentas usuarios</h3>
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td> <h5>Total, usuarios:</h5> </td>
                                            <td>
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="totalu" id="totalu"
                                                    value="{{ $list['users']['0'] + $list['users']['1'] + $list['users']['2']  }}"
                                                >
                                                100%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h5>Clientes:</h5></td>
                                            <td>
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="clients" id="clients"
                                                    value="{{ $list['users']['0']  }}"
                                                >
                                                {{ $percents['users']['0'] }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h5>Conductore:</h5></td>
                                            <td>
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="drivers" id="drivers"
                                                    value="{{ $list['users']['1']  }}"
                                                >
                                                {{ $percents['users']['1'] }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h5>Otros:</h5></td>
                                            <td>
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="others" id="others"
                                                    value="{{  $list['users']['2']  }}"
                                                >
                                                {{ $percents['users']['2'] }}%
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--servicio-->
            <h2>Presentacion de datos de servicio</h2>
            <div class="card-row">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3 class="m-b-40">Reporte de servicio</h3>
                                <canvas id="serviceRep"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3>Detalle de servicio</h3>
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td> <h5>Total, solicitudes:</h5> </td>
                                            <td> 
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="totalt" id="totalt"
                                                    value="{{ $list['travels']['0'] + $list['travels']['1'] + $list['travels']['2'] + $list['travels']['3'] }}"
                                                >
                                                100% 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h5>Confirmadas</h5></td>
                                            <td> 
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="confirmed" id="confirmed"
                                                    value="{{ $list['travels']['0'] }}"
                                                >
                                                {{ $percents['travels']['0'] }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h5>En camino:</h5></td>
                                            <td> 
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="pendient" id="pendient"
                                                    value="{{ $list['travels']['1']  }}"
                                                >
                                                {{ $percents['travels']['1'] }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h5>En espera:</h5></td>
                                            <td> 
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="wait" id="wait"
                                                    value="{{ $list['travels']['2']}}"
                                                >
                                                {{ $percents['travels']['2'] }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <h5>Canceladas:</h5></td>
                                            <td> 
                                                <input 
                                                    class="col-md-5 text-center"
                                                    disabled type="number" name="canceled" id="canceled"
                                                    value="{{ $list['travels']['3'] }}"
                                                >
                                                {{ $percents['travels']['3'] }}% 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
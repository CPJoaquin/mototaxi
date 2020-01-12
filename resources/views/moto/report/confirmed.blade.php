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

                            

                                        <th>conductor</th>
                                        <th>confirmados</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ count($value->confirmed) }}</td>
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
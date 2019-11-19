@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <section class="content-header">
                <br>
                <h2>Datos del Usuario</h2>
            </section>
            <div class="card-group">
                <div class="card">
                    <img class="card-img-top" src="{!! asset($item->photo) !!}" alt="Foto del Trabajador" style="width:100%">
                </div>
                <div class="card table-responsive">
                    <div class="card-body">
                        <h4 class="card-title d-flex">
                            Datos Personales
                            <a href="{!! route('user.index') !!}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-arrow-alt-circle-left"></i> Atrás</a>
                        </h4>
                        <br>
                        <div class="shadow p-4 mb-4 bg-white">
                            <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <td> <h5>Nombres:</h5> </td>
                                        <td> <h5>{!! $item->name !!}</h5> </td>
                                    </tr>
                                    <tr>
                                        <td> <h5>Email:</h5></td>
                                        <td> <h5>{!! $item->email !!}</h5> </td>
                                    </tr>
                                    <tr>
                                        <td> <h5>Rol:</h5></td>
                                        <td> <h5>@include('moto.user.role')</h5> </td>
                                    </tr>
                                </tbody>
                            </table>

                            {!! Form::open(['route' => ['user.destroy', $item->id], 'method' => 'DELETE', 'id' => 'formDelete']) !!}
                                <a href="{!!route('user.edit', [$item->id])!!}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Está seguro de eliminar este registro')"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

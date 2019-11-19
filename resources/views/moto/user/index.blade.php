@extends('layouts.app')
@section('content')
@include('layouts.menu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <section class="content-header">
                        <h1 class="pull-left">LISTA DE USUARIOS</h1>
                        <div class="d-flex">
                            <a class="btn btn-primary ml-auto" style="margin-right: 5px;"
                                href="{{ route('user.create')}}"><i class="fas fa-plus-circle"></i> Nuevo</a>
                        </div>
                        <br>
                    </section>
                    {!! Form::open(['route' => 'user.index', 'method' => 'GET', 'class' => ''])!!}
                    <div id="input-group">
                        {!!Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'Buscar','style' =>
                        'text-transform:uppercase;',
                        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();'])!!}
                    </div>
                    {!!Form::close()!!}
                    <br>
                    <div class="table-responsive">
                        <table id="grilla" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th width="50px">Número</th>
                                    <th>Rol</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th width="50px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    @if ($item->role === 'B' || $item->role === 'C' || $item->role ==='')
                                        <tr>
                                            <td style="text-align: center;">{!!$item->id!!}</td>
                                            <td>@include('moto.user.role')</td>
                                            <td>{!!$item->name!!}</td>
                                            <td>{!!$item->email!!}</td>
                                            <td style="text-align: center;">
                                                <div id="btn-group">
                                                    {!! Form::open(['route' => ['user.destroy', $item->id], 'method' =>
                                                    'DELETE', 'id' => 'formDelete']) !!}
                                                    <button class="btn-sm btn-primary" data-toggle="dropdown" type="button"><span
                                                            data-feather="settings"> <i class="fas fa-align-left"></i> </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{!!route('user.show', [$item->id])!!}"
                                                            class="dropdown-item btn btn-warning btn-sm"><span
                                                                data-feather="list"></span> Ver</a>
                                                        <button type="submit" class="dropdown-item btn btn-danger btn-sm"
                                                            onclick="return confirm('Está seguro de eliminar este registro')"><span
                                                                data-feather="trash-2"></span> Eliminar</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                
                                @endforeach
                            </tbody>
                        </table>
                        {!! $user->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

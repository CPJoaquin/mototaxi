@extends('layouts.app')
@section('content')
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
                                <tr>
                                    <th width="50px">Número</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr>
                                    <td style="text-align: center;">{!!$item->id!!}</td>
                                    <td>{!!$item->name!!}</td>
                                    <td>{!!$item->email!!}</td>
                                    <td style="text-align: center;">
                                        <div id="btn-group">
                                            {!! Form::open(['route' => ['user.destroy', $item->id], 'method' =>
                                            'DELETE', 'id' => 'formDelete']) !!}
                                            <button class="btn btn-primary" data-toggle="dropdown" type="button"><span
                                                    data-feather="settings"></button>
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
                                @endforeach
                            </tbody>
                        </table>
                        {!! $user->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

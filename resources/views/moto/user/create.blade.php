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

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex">
                                    {{ __('Registro de Usuario') }}
                                    <a href="{!! route('user.index') !!}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-arrow-alt-circle-left"></i> Atrás</a>
                                </div>
                                {!! Form::open(['route' => 'user.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                    @include('moto.user.fields')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
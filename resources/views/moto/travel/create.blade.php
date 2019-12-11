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

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex">
                                    {{ __('Solicitar transporte.') }}                                    
                                </div>
                                {!! Form::open(['route' => 'travel.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                    @include('moto.travel.fields')
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

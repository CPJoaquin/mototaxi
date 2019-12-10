<div class="card-body">
    @csrf


    <div class="form-group row {{ $errors->has('placa') ? 'has-error' : ''}}">
        {!! Form::label('placa', 'Placa de motocicleta:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::text('placa', null, [ 'class' => 'form-control', 'autofocus' => 'autofocus', 'style' => 'text-transform:uppercase;', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
            {!! $errors->first('placa', '<p class="alert-danger">:message</p>') !!}
        </div>
    </div>
    <div class="form-group row {{ $errors->has('user_id') ? 'has-error' : ''}}">
        {!! Form::label('user_id', 'Conductor de motocicleta:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::select('user_id', [null => 'Selecione un conductor.'] + $conductors, null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!} 
            {!! $errors->first('user_id', '<p class="alert-danger">:message</p>') !!}
        </div>
    </div>
    <div class="form-group row {{ $errors->has('color') ? 'has-error' : ''}}">
        {!! Form::label('color', 'Color de motocicleta:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::text('color', null, [ 'class' => 'form-control', 'autofocus' => 'autofocus', 'style' => 'text-transform:uppercase;','onkeyup' => 'javascript:this.value=this.value.toUpperCase();' ]) !!} 
            {!! $errors->first('color', '<p class="alert-danger">:message</p>') !!}
        </div>
    </div>
    <div class="form-group row {{ $errors->has('marc') ? 'has-error' : ''}}">
        {!! Form::label('marc', 'Marca de motocicleta:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::text('marc', null, ['class' => 'form-control', 'autofocus' => 'autofocus','style' =>
            'text-transform:uppercase;',
            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
            {!! $errors->first('marc', '<p class="alert-danger">:message</p>') !!}
        </div>
    </div>
    <div class="form-group row {{ $errors->has('model') ? 'has-error' : ''}}">
        {!! Form::label('model', 'Modelo de motocicleta:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::text('model', null, [ 'class' => 'form-control', 'autofocus' => 'autofocus', 'style' =>
            'text-transform:uppercase;', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
            {!! $errors->first('model', '<p class="alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Esta seguro de guardar los cambios que hizo?')">
                {{ __('Registrar') }}
            </button>
        </div>
    </div>
</div>
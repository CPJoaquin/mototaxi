<div class="card-body">
    @csrf

    <div class="form-group row {{ $errors->has('primary') ? 'has-error' : ''}}">
        {!! Form::label('primary', 'Calle principal:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::text('primary', null, ['class' => 'form-control', 'autofocus' => 'autofocus','style' =>
            'text-transform:uppercase;',
            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
            {!! $errors->first('primary', '<p class="alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('secondary') ? 'has-error' : ''}}">
        {!! Form::label('secondary', 'Calle secundaria y/o descripción:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::text('secondary', null, ['class' => 'form-control', 'autofocus' => 'autofocus','style' =>
            'text-transform:uppercase;',
            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
            {!! $errors->first('secondary', '<p class="alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('time') ? 'has-error' : ''}}">
        {!! Form::label('time', 'Hora:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::time('time', null, ['class' => 'form-control', 'autofocus' => 'autofocus'])!!} 
            {!! $errors->first('time', '<p class="alert-danger">:message</p>') !!}
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
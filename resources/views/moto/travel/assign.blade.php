<div class="card-body">
    @csrf

    <div class="form-group row {{ $errors->has('driver_id') ? 'has-error' : ''}}">
        {!! Form::label('driver_id', 'Conductor de motocicleta:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

        <div class="col-md-6">
            {!! Form::select('driver_id', [null => 'Selecione un conductor.'] + $conductors, null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!} 
            {!! $errors->first('driver_id', '<p class="alert-danger">:message</p>') !!}
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
<div class="card-body">
                                    @csrf


                                    <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                                        {!! Form::label('password', 'Password:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                                        <div class="col-md-6">
                                            {!! Form::password('password', [ 'class' => 'form-control', 'autofocus' => 'autofocus']) !!} 
                                            {!! $errors->first('password', '<p class="alert-danger">:message</p>') !!}
                                        </div>
                                    </div>


                                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                        {!! Form::label('name', 'Nombres:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                                        <div class="col-md-6">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'autofocus','style' =>
                                            'text-transform:uppercase;',
                                            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
                                            {!! $errors->first('name', '<p class="alert-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('photo') ? 'has-error' : ''}}">
                                        {!! Form::label('photo', 'Fotografía:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                    
                                        <div class="col-md-6">
                                            <div class="custom-file">
                                                {!! Form::file('photo', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('photo', ' <p class="alert-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                                        {!! Form::label('email', 'Email:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                                        <div class="col-md-6">
                                            {!! Form::text('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!} 
                                            {!! $errors->first('email', '<p class="alert-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('role') ? 'has-error' : ''}}">
                                        {!! Form::label('role', 'Rol:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                                        <div class="col-md-6">
                                            {!! Form::select('role', [null => 'Selecione un tipo...'] + ['A' => 'DBA','B'=>'ADMINISTRADOR', 'C'=>'OPERADOR'], null,
                                            ['class' => 'form-control',
                                            'autofocus' => 'autofocus']) !!} {!! $errors->first('role', '
                                            <p class="alert-danger">:message</p>') !!}
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
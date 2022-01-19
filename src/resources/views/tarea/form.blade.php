<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('desc_tarea') }}
            {{ Form::text('desc_tarea', $tarea->desc_tarea, ['class' => 'form-control' . ($errors->has('desc_tarea') ? ' is-invalid' : ''), 'placeholder' => 'Desc Tarea']) }}
            {!! $errors->first('desc_tarea', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_creacion') }}
            {{ Form::text('fecha_creacion', $tarea->fecha_creacion, ['class' => 'form-control' . ($errors->has('fecha_creacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Creacion']) }}
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_expiracion') }}
            {{ Form::text('fecha_expiracion', $tarea->fecha_expiracion, ['class' => 'form-control' . ($errors->has('fecha_expiracion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Expiracion']) }}
            {!! $errors->first('fecha_expiracion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado_tarea') }}
            {{ Form::text('estado_tarea', $tarea->estado_tarea, ['class' => 'form-control' . ($errors->has('estado_tarea') ? ' is-invalid' : ''), 'placeholder' => 'Estado Tarea']) }}
            {!! $errors->first('estado_tarea', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario') }}
            {{ Form::text('id_usuario', $tarea->id_usuario, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario']) }}
            {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
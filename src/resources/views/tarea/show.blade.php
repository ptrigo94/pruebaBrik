@extends('layouts.app')

@section('template_title')
    {{ $tarea->name ?? 'Show Tarea' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tarea</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tareas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Desc Tarea:</strong>
                            {{ $tarea->desc_tarea }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creacion:</strong>
                            {{ $tarea->fecha_creacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Expiracion:</strong>
                            {{ $tarea->fecha_expiracion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Tarea:</strong>
                            {{ $tarea->estado_tarea }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $tarea->id_usuario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Remembertoken:</strong>
                            {{ $user->rememberToken }}
                        </div>
                        <div class="form-group">
                            <strong>Timestamps:</strong>
                            {{ $user->timestamps }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $user->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Rut:</strong>
                            {{ $user->rut }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Dashboard') }}</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <!-- Opciones para Usuarios Autenticados -->
                    @auth
                        <h6 class="mt-4">{{ __('Actions') }}</h6>
                        <ul class="list-group">
                            <!-- Opciones para Administradores -->
                            @if (Auth::user()->isAdmin())
                                <li class="list-group-item">
                                    <a href="{{ route('logs.index') }}" class="text-decoration-none">
                                        <i class="bi bi-journal-text"></i> {{ __('View Logs') }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('users.index') }}" class="text-decoration-none">
                                        <i class="bi bi-people"></i> {{ __('Manage Users') }}
                                    </a>
                                </li>
                            @endif

                            <!-- Opciones para Usuarios Normales -->
                            <li class="list-group-item">
                                <a href="{{ route('profile.edit') }}" class="text-decoration-none">
                                    <i class="bi bi-person-circle"></i> {{ __('Edit Profile') }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('carga.excel.form') }}" class="text-decoration-none">
                                    <i class="bi bi-upload"></i> {{ __('Upload Excel Data') }}
                                </a>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

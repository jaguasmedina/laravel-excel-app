@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Perfil') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Nombre') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Correo Electrónico') }}</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Actualizar Perfil') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

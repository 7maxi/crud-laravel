@extends('layouts.app')
@section('content')
<div class="container text-center py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="display-4 fw-bold text-primary mb-4">Gestión de Coches</h1>
            <p class="lead text-muted mb-4">
                Bienvenido al sistema de gestión de coches.
            </p>
            <a href="{{ route('coches.index') }}" class="btn btn-primary btn-lg px-4">
                <i class="bi bi-card-list"></i> Ver Lista de Coches
            </a>
        </div>
    </div>
</div>
@endsection

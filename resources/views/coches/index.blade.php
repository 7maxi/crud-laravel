@extends('layouts.app')

@section('title', 'Lista de Coches')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Lista de Coches</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Color</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($coches as $coche)
                    <tr>
                        <td>{{ $coche->id }}</td>
                        <td>{{ $coche->marca }}</td>
                        <td>{{ $coche->modelo }}</td>
                        <td>{{ $coche->anio }}</td>
                        <td>{{ number_format($coche->precio, 2) }} €</td>
                        <td>
                            <span class="badge" style="background-color: {{ strtolower($coche->color) }}; color: #000;">
                                {{ ucfirst($coche->color) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('coches.edit', $coche->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('coches.destroy', $coche->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No hay coches registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('coches.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Añadir Coche
        </a>
    </div>
</div>
@endsection

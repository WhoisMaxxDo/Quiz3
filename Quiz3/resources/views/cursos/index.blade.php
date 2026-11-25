@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Administrar cursos</h1>

        <a href="{{ route('cursos.create') }}" class="btn btn-primary">
            Nuevo curso
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Créditos</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->codigo }}</td>
                            <td>{{ $curso->nombre }}</td>
                            <td>{{ $curso->creditos }}</td>
                            <td>{{ $curso->carrera->nombre }}</td>

                            <td>
                                <div class="d-flex gap-2">
                                    <a
                                        href="{{ route('cursos.edit', $curso) }}"
                                        class="btn btn-outline-primary btn-sm"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('cursos.destroy', $curso) }}"
                                        onsubmit="return confirm('¿Eliminar este curso?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                        >
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                No hay cursos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
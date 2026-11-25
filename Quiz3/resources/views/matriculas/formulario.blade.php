@extends('layout')

@section('content')
    <div class="text-center mb-4">
        <h1 class="h2">Matrícula de estudiantes</h1>
        <p class="text-secondary">
            Completa tus datos y selecciona un curso.
        </p>
    </div>

    <div class="card shadow-sm formulario mx-auto">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('matriculas.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nombre_estudiante" class="form-label">
                        Nombre completo
                    </label>

                    <input
                        id="nombre_estudiante"
                        name="nombre_estudiante"
                        class="form-control"
                        value="{{ old('nombre_estudiante') }}"
                        maxlength="150"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="correo_estudiante" class="form-label">
                        Correo electrónico
                    </label>

                    <input
                        id="correo_estudiante"
                        type="email"
                        name="correo_estudiante"
                        class="form-control"
                        value="{{ old('correo_estudiante') }}"
                        maxlength="150"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label for="curso_id" class="form-label">
                        Curso disponible
                    </label>

                    <select
                        id="curso_id"
                        name="curso_id"
                        class="form-select"
                        required
                    >
                        <option value="">Selecciona un curso</option>

                        @foreach ($cursos as $curso)
                            <option
                                value="{{ $curso->id }}"
                                @selected(old('curso_id') == $curso->id)
                            >
                                {{ $curso->codigo }} — {{ $curso->nombre }}
                                — {{ $curso->creditos }} créditos
                                — {{ $curso->carrera->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if ($cursos->isEmpty())
                    <div class="alert alert-warning">
                        No hay cursos disponibles. Agrega uno desde Cursos.
                    </div>
                @endif

                <button
                    type="submit"
                    class="btn btn-primary w-100"
                    @disabled($cursos->isEmpty())
                >
                    Matricular
                </button>
            </form>
        </div>
    </div>
@endsection
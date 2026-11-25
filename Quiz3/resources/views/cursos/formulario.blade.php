@extends('layout')

@section('content')
    <div class="card shadow-sm formulario mx-auto">
        <div class="card-body p-4">
            <h1 class="h3 mb-4">
                {{ $curso->exists ? 'Editar curso' : 'Nuevo curso' }}
            </h1>

            <form
                method="POST"
                action="{{ $curso->exists
                    ? route('cursos.update', $curso)
                    : route('cursos.store') }}"
            >
                @csrf

                @if ($curso->exists)
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="nombre" class="form-label">
                        Nombre del curso
                    </label>

                    <input
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        value="{{ old('nombre', $curso->nombre) }}"
                        maxlength="150"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label">
                        Código del curso
                    </label>

                    <input
                        id="codigo"
                        name="codigo"
                        class="form-control"
                        value="{{ old('codigo', $curso->codigo) }}"
                        maxlength="30"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="creditos" class="form-label">
                        Cantidad de créditos
                    </label>

                    <input
                        id="creditos"
                        type="number"
                        name="creditos"
                        class="form-control"
                        value="{{ old('creditos', $curso->creditos) }}"
                        min="1"
                        max="30"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label for="carrera_id" class="form-label">
                        Carrera
                    </label>

                    <select
                        id="carrera_id"
                        name="carrera_id"
                        class="form-select"
                        required
                    >
                        <option value="">Selecciona una carrera</option>

                        @foreach ($carreras as $carrera)
                            <option
                                value="{{ $carrera->id }}"
                                @selected(old('carrera_id', $curso->carrera_id) == $carrera->id)
                            >
                                {{ $carrera->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Guardar curso
                </button>

                <a href="{{ route('cursos.index') }}"
                   class="btn btn-outline-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@endsection
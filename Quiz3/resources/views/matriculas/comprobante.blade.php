@extends('layout')

@section('content')
    <div class="card shadow-sm formulario mx-auto">
        <div class="card-body p-4">
            <span class="badge bg-success mb-3">
                Matrícula confirmada
            </span>

            <h1 class="h3 mb-4">Comprobante de matrícula</h1>

            <dl class="row">
                <dt class="col-sm-4">Número</dt>
                <dd class="col-sm-8">{{ $matricula->id }}</dd>

                <dt class="col-sm-4">Estudiante</dt>
                <dd class="col-sm-8">
                    {{ $matricula->nombre_estudiante }}
                </dd>

                <dt class="col-sm-4">Correo</dt>
                <dd class="col-sm-8 text-break">
                    {{ $matricula->correo_estudiante }}
                </dd>

                <dt class="col-sm-4">Curso</dt>
                <dd class="col-sm-8">{{ $matricula->curso->nombre }}</dd>

                <dt class="col-sm-4">Código</dt>
                <dd class="col-sm-8">{{ $matricula->curso->codigo }}</dd>

                <dt class="col-sm-4">Créditos</dt>
                <dd class="col-sm-8">{{ $matricula->curso->creditos }}</dd>

                <dt class="col-sm-4">Carrera</dt>
                <dd class="col-sm-8">
                    {{ $matricula->curso->carrera->nombre }}
                </dd>

                <dt class="col-sm-4">Fecha</dt>
                <dd class="col-sm-8">
                    {{ $matricula->created_at->format('d/m/Y H:i') }}
                </dd>
            </dl>

            <a href="{{ route('matriculas.create') }}"
               class="btn btn-primary">
                Nueva matrícula
            </a>
        </div>
    </div>
@endsection
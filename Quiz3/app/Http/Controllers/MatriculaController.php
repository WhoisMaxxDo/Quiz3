<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function create()
    {
        $cursos = Curso::with('carrera')
            ->orderBy('nombre')
            ->get();

        return view('matriculas.formulario', compact('cursos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre_estudiante' => [
                'required',
                'string',
                'max:150',
            ],
            'correo_estudiante' => [
                'required',
                'email',
                'max:150',
            ],
            'curso_id' => ['required', 'exists:cursos,id'],
        ]);

        $matricula = Matricula::create($datos);

        return redirect()
            ->route('matriculas.show', $matricula)
            ->with('success', 'Matrícula registrada correctamente.');
    }

    public function show(Matricula $matricula)
    {
        $matricula->load('curso.carrera');

        return view('matriculas.comprobante', compact('matricula'));
    }
}
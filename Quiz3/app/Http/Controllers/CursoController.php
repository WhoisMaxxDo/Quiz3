<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('carrera')
            ->orderBy('nombre')
            ->get();

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $curso = new Curso();
        $carreras = Carrera::orderBy('nombre')->get();

        return view('cursos.formulario', compact('curso', 'carreras'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'codigo' => [
                'required',
                'string',
                'max:30',
                'unique:cursos,codigo',
            ],
            'creditos' => ['required', 'integer', 'min:1', 'max:30'],
            'carrera_id' => ['required', 'exists:carreras,id'],
        ]);

        Curso::create($datos);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso creado correctamente.');
    }

    public function edit(Curso $curso)
    {
        $carreras = Carrera::orderBy('nombre')->get();

        return view('cursos.formulario', compact('curso', 'carreras'));
    }

    public function update(Request $request, Curso $curso)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'codigo' => [
                'required',
                'string',
                'max:30',
                Rule::unique('cursos', 'codigo')->ignore($curso->id),
            ],
            'creditos' => ['required', 'integer', 'min:1', 'max:30'],
            'carrera_id' => ['required', 'exists:carreras,id'],
        ]);

        $curso->update($datos);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->matriculas()->exists()) {
            return back()->with(
                'error',
                'No puedes eliminar un curso con matrículas registradas.'
            );
        }

        $curso->delete();

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}
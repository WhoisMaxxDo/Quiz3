<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $sistemas = Carrera::firstOrCreate([
            'nombre' => 'Ingeniería de Sistemas',
        ]);

        $administracion = Carrera::firstOrCreate([
            'nombre' => 'Administración de Empresas',
        ]);

        $contabilidad = Carrera::firstOrCreate([
            'nombre' => 'Contabilidad',
        ]);

        $cursos = [
            [
                'codigo' => 'PRG101',
                'nombre' => 'Programación I',
                'creditos' => 4,
                'carrera_id' => $sistemas->id,
            ],
            [
                'codigo' => 'BD101',
                'nombre' => 'Bases de Datos',
                'creditos' => 3,
                'carrera_id' => $sistemas->id,
            ],
            [
                'codigo' => 'ADM101',
                'nombre' => 'Administración General',
                'creditos' => 3,
                'carrera_id' => $administracion->id,
            ],
            [
                'codigo' => 'CON101',
                'nombre' => 'Contabilidad I',
                'creditos' => 4,
                'carrera_id' => $contabilidad->id,
            ],
        ];

        foreach ($cursos as $curso) {
            Curso::updateOrCreate(
                ['codigo' => $curso['codigo']],
                $curso
            );
        }
    }
}
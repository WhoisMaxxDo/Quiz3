# Quiz 3 - Cursos y matrículas

Proyecto realizado con Laravel 12 siguiendo MVC.
Usa Blade, Bootstrap y SQLite.

## Funciones

- CRUD de cursos con nombre, código, créditos y carrera.
- Carreras y cursos iniciales mediante seeder.
- Formulario principal para matricular estudiantes.
- Comprobante con los datos del registro.
- Validaciones y bloqueo de eliminación de cursos matriculados.

## Instalación

Requiere PHP 8.2 o superior, Composer y SQLite habilitado en PHP.

```bash
composer install
cp .env.example .env
php artisan key:generate
php -r 'if (!file_exists("database/database.sqlite")) { touch("database/database.sqlite"); }'
php artisan migrate --seed
php artisan serve
```

Usar `DB_CONNECTION=sqlite` en `.env`.

Abrir http://127.0.0.1:8000.

Bootstrap se carga por CDN y necesita conexión a internet.
No se requiere npm ni MySQL.

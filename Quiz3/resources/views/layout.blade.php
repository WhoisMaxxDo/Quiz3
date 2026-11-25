<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz 3 - Matrículas</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body { background: #f3f6fa; }
        .navbar { background: #244b72; }
        .card { border: 0; border-radius: 14px; }
        .formulario { max-width: 650px; }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark mb-4">
        <div class="container gap-3">
            <a class="navbar-brand" href="{{ route('matriculas.create') }}">
                Mi matrícula
            </a>

            <div class="d-flex gap-2">
                <a class="btn btn-outline-light btn-sm"
                   href="{{ route('matriculas.create') }}">
                    Matricular
                </a>

                <a class="btn btn-outline-light btn-sm"
                   href="{{ route('cursos.index') }}">
                    Cursos
                </a>
            </div>
        </div>
    </nav>

    <main class="container py-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Revisa los datos:</strong>

                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-secondary small py-4">
        Quiz 3 · Cursos y matrículas
    </footer>
</body>
</html>
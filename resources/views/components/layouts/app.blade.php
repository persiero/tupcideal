<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuPC Ideal - Asistente Inteligente</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Un pequeño efecto de transición suave */
        .fade-in { animation: fadeIn 0.5s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <span class="text-2xl">🤖</span>
                    <h1 class="font-bold text-xl text-indigo-600">TuPC Ideal</h1>
                </div>
                <a href="/admin" class="text-sm text-slate-500 hover:text-indigo-600">Soy Administrador</a>
            </div>
        </div>
    </nav>

    <main class="py-10">
        {{ $slot }}
    </main>

</body>
</html>
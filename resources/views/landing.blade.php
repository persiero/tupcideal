<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuPC Ideal - Encuentra tu equipo perfecto</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    {{-- Fuentes de Google para un toque más moderno --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body { font-family: 'Inter', sans-serif; }
        section { scroll-margin-top: 100px; }
        #inicio { padding-top: 70px !important; }
        @media (min-width: 1024px) {
            #inicio { padding-top: 90px !important; }
        }
        #main-header {
            background: white;
        }
        #main-header.scrolled {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body class="bg-[#F8FAFC] min-h-screen font-sans text-slate-900 antialiased selection:bg-indigo-100 selection:text-indigo-700">
    
    {{-- Header con fondo blanco sólido --}}
    <header class="fixed top-0 w-full z-50 transition-all duration-300" id="main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4"> <div class="flex items-center gap-3">
                    <a href="#inicio" class="flex-shrink-0 flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-extrabold text-xl tracking-tight text-slate-900 leading-none group-hover:text-indigo-700 transition-colors">TuPC Ideal</span>
                            <span class="text-[10px] font-bold text-indigo-500 tracking-wider uppercase">Asesoría IA</span>
                        </div>
                    </a>
                </div>

                <nav class="hidden lg:flex items-center gap-2">
                    {{-- Estilo nuevo: Botones transparentes con hover suave --}}
                    <a href="#inicio" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-full transition-all">Inicio</a>
                    <a href="#como-funciona" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-full transition-all">¿Cómo funciona?</a>
                    <a href="#casos" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-full transition-all">Testimonios</a>
                    
                    <div class="h-6 w-px bg-slate-200 mx-2"></div> <a href="#wizard" class="ml-2 px-6 py-2.5 bg-slate-900 text-white text-sm font-bold rounded-full hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-200 hover:-translate-y-0.5 transition-all duration-300">
                        Comenzar Gratis
                    </a>
                </nav>

                <button class="lg:hidden p-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition" onclick="toggleMenu()">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100 absolute w-full left-0 shadow-2xl h-screen">
            <div class="px-6 pt-8 pb-6 space-y-4">
                <a href="#inicio" class="block px-4 py-3 rounded-xl text-lg font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50" onclick="toggleMenu()">Inicio</a>
                <a href="#como-funciona" class="block px-4 py-3 rounded-xl text-lg font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50" onclick="toggleMenu()">¿Cómo funciona?</a>
                <a href="#casos" class="block px-4 py-3 rounded-xl text-lg font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50" onclick="toggleMenu()">Testimonios</a>
                <a href="#wizard" class="block px-4 py-3 rounded-xl text-lg font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50" onclick="toggleMenu()">Recomendador</a>
                <a href="#contacto" class="block px-4 py-3 rounded-xl text-lg font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50" onclick="toggleMenu()">Contacto</a>
            </div>
        </div>
    </header>

    {{-- Cambios: pt-28 para compensar header fijo --}}
    <section id="inicio" class="relative pt-24 pb-16 lg:pt-32 lg:pb-20 overflow-hidden">
        
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-indigo-50/50 rounded-full blur-3xl opacity-60 mix-blend-multiply"></div>
            <div class="absolute bottom-0 right-0 w-[800px] h-[600px] bg-purple-50/50 rounded-full blur-3xl opacity-60 mix-blend-multiply"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
                
                <div class="text-center md:text-left z-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-indigo-100 text-indigo-700 text-xs font-bold uppercase tracking-wide mb-12 shadow-sm">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                        </span>
                        Sistema Actualizado 2026
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-8 leading-[1.1]">
                        Tu PC Ideal <br>
                        {{-- Cambio de color a un gradiente más intenso --}}
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Sin Complicaciones</span>
                    </h1>
                    
                    <p class="text-xl text-slate-600 mb-8 leading-relaxed max-w-lg mx-auto md:mx-0 font-medium">
                        Olvídate de tecnicismos confusos. Responde 3 preguntas simples y nuestra IA diseñará la computadora perfecta para tu presupuesto.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#wizard" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 transition shadow-xl shadow-indigo-200 hover:shadow-2xl hover:-translate-y-1 flex items-center justify-center gap-2 group">
                            <span>🚀</span> Encontrar mi PC
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#como-funciona" class="px-8 py-4 bg-white text-slate-700 font-bold rounded-2xl border border-slate-200 hover:border-indigo-300 hover:bg-indigo-50 transition flex items-center justify-center gap-2">
                            <span>🤔</span> ¿Cómo funciona?
                        </a>
                    </div>

                    <div class="mt-12 flex items-center justify-center md:justify-start gap-4 text-sm font-medium text-slate-500">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://i.pravatar.cc/100?u=a" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://i.pravatar.cc/100?u=b" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://i.pravatar.cc/100?u=c" alt="User">
                            <div class="w-10 h-10 rounded-full border-2 border-white shadow-sm bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-600">+1k</div>
                        </div>
                        <div class="text-left">
                            <p class="text-slate-900 font-bold">1,200+ Personas</p>
                            <p class="text-xs">ya encontraron su equipo</p>
                        </div>
                    </div>
                </div>

                <div class="relative flex flex-col items-center md:items-end justify-center">
                    <div class="absolute top-10 right-10 w-72 h-72 bg-purple-300 rounded-full blur-[80px] opacity-30 animate-pulse"></div>
                    <div class="absolute bottom-10 left-10 w-72 h-72 bg-indigo-300 rounded-full blur-[80px] opacity-30"></div>
                    
                    <div class="relative w-full max-w-[400px] transform transition-transform hover:scale-[1.02] duration-700">
                        {{-- Tu imagen mantenida --}}
                        <img src="{{ asset('images/laptop2.png') }}" alt="TuPC Ideal" class="w-full h-auto drop-shadow-2xl">                        
                        
                        <div class="absolute -bottom-6 -left-8 bg-white p-4 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-slate-100 hidden md:block animate-bounce" style="animation-duration: 4s;">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-xl font-bold">✓</div>
                                <div>
                                    <p class="text-[11px] text-slate-400 font-extrabold uppercase tracking-wider">ANÁLISIS</p>
                                    <p class="text-base font-bold text-slate-800">100% Compatible</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="como-funciona" class="pt-8 pb-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl font-bold text-center mb-12 text-slate-800">¿Cómo funciona?</h3>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">🎯</span>
                    </div>
                    <h4 class="font-bold text-lg mb-2">1. Define tu perfil</h4>
                    <p class="text-slate-600">Estudiante, profesional, gamer... Selecciona tu uso principal</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">💻</span>
                    </div>
                    <h4 class="font-bold text-lg mb-2">2. Elige movilidad</h4>
                    <p class="text-slate-600">¿Laptop portátil o PC de escritorio potente?</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl">✅</span>
                    </div>
                    <h4 class="font-bold text-lg mb-2">3. Recibe recomendación</h4>
                    <p class="text-slate-600">Especificaciones exactas y opción de cotizar por WhatsApp</p>
                </div>
            </div>
        </div>
    </section>

    <!-- WIZARD SECTION -->
    <section id="wizard" class="py-16 px-4 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <livewire:wizard />
            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="py-16 px-4 bg-slate-900 text-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl font-bold text-center mb-12">¿Por qué usar nuestro recomendador?</h3>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="flex gap-4">
                    <div class="text-3xl">🚀</div>
                    <div>
                        <h4 class="font-bold text-lg mb-2">Ahorra tiempo</h4>
                        <p class="text-slate-300">No pierdas horas investigando. Te damos la respuesta en 2 minutos.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-3xl">💰</div>
                    <div>
                        <h4 class="font-bold text-lg mb-2">Evita errores costosos</h4>
                        <p class="text-slate-300">Compra exactamente lo que necesitas, sin gastar de más.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-3xl">🎓</div>
                    <div>
                        <h4 class="font-bold text-lg mb-2">Basado en expertos</h4>
                        <p class="text-slate-300">Recomendaciones creadas por profesionales del sector.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-3xl">📱</div>
                    <div>
                        <h4 class="font-bold text-lg mb-2">Cotiza al instante</h4>
                        <p class="text-slate-300">Contacta directamente por WhatsApp con tu código de referencia.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIOS / CASOS DE USO -->
    <section id="casos" class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl font-bold text-center mb-4 text-slate-800">Casos de éxito</h3>
            <p class="text-center text-slate-600 mb-12 max-w-2xl mx-auto">
                Mira cómo hemos ayudado a diferentes perfiles a encontrar su equipo ideal
            </p>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonio 1 -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-6 rounded-xl border border-indigo-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            M
                        </div>
                        <div>
                            <div class="font-bold text-slate-800">María González</div>
                            <div class="text-sm text-slate-500">Estudiante de Arquitectura</div>
                        </div>
                    </div>
                    <p class="text-slate-600 italic mb-3">
                        "Necesitaba una laptop para AutoCAD y Revit. El recomendador me sugirió exactamente lo que necesitaba sin gastar de más."
                    </p>
                    <div class="flex gap-1 text-yellow-500">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>

                <!-- Testimonio 2 -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            C
                        </div>
                        <div>
                            <div class="font-bold text-slate-800">Carlos Ruiz</div>
                            <div class="text-sm text-slate-500">Programador Freelance</div>
                        </div>
                    </div>
                    <p class="text-slate-600 italic mb-3">
                        "Perfecto para desarrollo web. Las especificaciones fueron precisas y ahora trabajo sin problemas con Docker y VS Code."
                    </p>
                    <div class="flex gap-1 text-yellow-500">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>

                <!-- Testimonio 3 -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 p-6 rounded-xl border border-orange-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            A
                        </div>
                        <div>
                            <div class="font-bold text-slate-800">Ana Torres</div>
                            <div class="text-sm text-slate-500">Diseñadora Gráfica</div>
                        </div>
                    </div>
                    <p class="text-slate-600 italic mb-3">
                        "Trabajo con Photoshop e Illustrator todo el día. La recomendación fue exacta y el precio justo para mi presupuesto."
                    </p>
                    <div class="flex gap-1 text-yellow-500">
                        ⭐⭐⭐⭐⭐
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-16 px-4 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-3xl font-bold text-center mb-4 text-slate-800">Preguntas Frecuentes</h3>
            <p class="text-center text-slate-600 mb-12">Resolvemos tus dudas más comunes</p>
            
            <div class="space-y-4">
                <!-- FAQ 1 -->
                <details class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition group">
                    <summary class="font-bold text-lg text-slate-800 cursor-pointer flex justify-between items-center">
                        ¿Es realmente gratis?
                        <span class="text-indigo-600 group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Sí, 100% gratis. No pedimos tarjeta de crédito ni datos personales. Solo respondes 3 preguntas y recibes tu recomendación al instante.
                    </p>
                </details>

                <!-- FAQ 2 -->
                <details class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition group">
                    <summary class="font-bold text-lg text-slate-800 cursor-pointer flex justify-between items-center">
                        ¿Qué tan precisas son las recomendaciones?
                        <span class="text-indigo-600 group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Nuestras recomendaciones están basadas en años de experiencia y son actualizadas constantemente por profesionales del sector. Consideramos el uso específico, presupuesto y necesidades reales de cada perfil.
                    </p>
                </details>

                <!-- FAQ 3 -->
                <details class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition group">
                    <summary class="font-bold text-lg text-slate-800 cursor-pointer flex justify-between items-center">
                        ¿Puedo cotizar después?
                        <span class="text-indigo-600 group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Sí, al finalizar recibirás un código de seguimiento único. Guárdalo y podrás cotizar cuando quieras por WhatsApp. El código incluye todas tus especificaciones recomendadas.
                    </p>
                </details>

                <!-- FAQ 4 -->
                <details class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition group">
                    <summary class="font-bold text-lg text-slate-800 cursor-pointer flex justify-between items-center">
                        ¿Qué pasa si no encuentro mi perfil exacto?
                        <span class="text-indigo-600 group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Selecciona el perfil más cercano a tu uso. Nuestro sistema te dará una recomendación base que puedes ajustar al cotizar por WhatsApp con nuestro equipo.
                    </p>
                </details>

                <!-- FAQ 5 -->
                <details class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition group">
                    <summary class="font-bold text-lg text-slate-800 cursor-pointer flex justify-between items-center">
                        ¿Incluyen el precio?
                        <span class="text-indigo-600 group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Te mostramos las especificaciones técnicas recomendadas. Los precios varían según disponibilidad y marca, por eso te invitamos a cotizar por WhatsApp para obtener el mejor precio actualizado.
                    </p>
                </details>

                <!-- FAQ 6 -->
                <details class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition group">
                    <summary class="font-bold text-lg text-slate-800 cursor-pointer flex justify-between items-center">
                        ¿Ofrecen garantía o soporte técnico?
                        <span class="text-indigo-600 group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Sí, ofrecemos servicios adicionales de instalación, configuración y soporte técnico. Puedes seleccionarlos al finalizar tu recomendación antes de contactar por WhatsApp.
                    </p>
                </details>
            </div>

            <!-- CTA Final en FAQ -->
            <div class="text-center mt-12">
                <p class="text-slate-600 mb-4">¿Tienes otra pregunta?</p>
                <a href="#wizard" class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
                    Prueba el recomendador ahora
                </a>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section id="contacto" class="py-16 px-4 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto text-center">
            <h3 class="text-3xl font-bold mb-4 text-slate-800">¿Necesitas ayuda personalizada?</h3>
            <p class="text-slate-600 mb-8">Contáctanos y te asesoramos sin compromiso</p>
            
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <!-- WhatsApp -->
                <a href="https://wa.me/51915391298" target="_blank" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-800 mb-1">WhatsApp</h4>
                    <p class="text-sm text-slate-600">+51 915 391 298</p>
                </a>

                <!-- Email -->
                <a href="mailto:contacto@recomendadorpc.com" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition text-5xl">
                        📧
                    </div>
                    <h4 class="font-bold text-slate-800 mb-1">Email</h4>
                    <p class="text-sm text-slate-600">contacto@gmail.com</p>
                </a>

                <!-- Teléfono -->
                <a href="tel:+51915391298" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition text-5xl">
                        📱
                    </div>
                    <h4 class="font-bold text-slate-800 mb-1">Teléfono</h4>
                    <p class="text-sm text-slate-600">+51 915 391 298</p>
                </a>
            </div>

            <!-- Redes Sociales -->
            <div class="flex justify-center gap-4">
                <a href="https://facebook.com" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <a href="https://instagram.com" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-pink-600 hover:text-white transition shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="https://twitter.com" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:bg-sky-500 hover:text-white transition shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-800 text-slate-400 py-8 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 mb-6">
                <div>
                    <h4 class="font-bold text-white mb-3">TuPC Ideal</h4>
                    <p class="text-sm">Encuentra el equipo perfecto para ti en minutos. Asesoría gratuita y personalizada.</p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-3">Enlaces</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#inicio" class="hover:text-white transition">Inicio</a></li>
                        <li><a href="#como-funciona" class="hover:text-white transition">¿Cómo funciona?</a></li>
                        <li><a href="#wizard" class="hover:text-white transition">Recomendador</a></li>
                        <li><a href="#contacto" class="hover:text-white transition">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-3">Contacto</h4>
                    <ul class="space-y-2 text-sm">
                        <li>📧 contacto@tupcideal.com</li>
                        <li>📱 +51 999 999 999</li>
                        <li>📍 Lima, Perú</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-700 pt-6 text-center text-sm">
                <p>© 2025 TuPC Ideal - Todos los derechos reservados</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
        
        // Header shadow on scroll logic
        window.addEventListener('scroll', function() {
            const header = document.getElementById('main-header');
            if (window.scrollY > 10) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>

    @livewireScripts
</body>
</html>

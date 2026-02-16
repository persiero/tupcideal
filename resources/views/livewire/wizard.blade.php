<div>

    <!-- Barra de progreso mejorada -->
    <div class="mb-10">
        <div class="flex justify-between items-center mb-3">
            <span class="text-sm font-bold text-slate-700">Paso {{ $step }} de 4</span>
            <span class="text-xs text-slate-500">{{ $step * 25 }}% completado</span>
        </div>
        <div class="h-3 w-full bg-slate-100 rounded-full overflow-hidden shadow-inner">
            <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 transition-all duration-500 ease-out rounded-full" 
                 style="width: {{ $step * 25 }}%"></div>
        </div>
    </div>

    @if ($step === 1)
        <div class="fade-in">
            <div class="text-center mb-12">
                <div class="inline-block p-4 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-3xl mb-4 shadow-lg">
                    <span class="text-5xl">🎯</span>
                </div>
                <h2 class="text-4xl font-extrabold mb-3 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">¿Para qué necesitas tu computadora?</h2>
                <p class="text-lg text-slate-600">Selecciona el uso principal que le darás</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-5xl mx-auto">
                @foreach ($categories as $category)
                    <button wire:click="selectCategory({{ $category->id }})" 
                            class="group relative p-6 md:p-8 bg-white border-2 border-slate-200 rounded-3xl hover:border-indigo-400 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-left overflow-hidden">
                        <!-- Efecto de fondo animado -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 to-purple-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="relative flex items-center md:items-start gap-4 md:gap-5">
                            <!-- Ícono personalizado -->
                            <div class="flex-shrink-0 w-14 h-14 md:w-16 md:h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center text-2xl md:text-3xl shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                {{ $category->icon ?? '💼' }}
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <h3 class="font-bold text-lg md:text-xl text-slate-900 group-hover:text-indigo-700 mb-1 md:mb-2 transition-colors">
                                    {{ $category->name }}
                                </h3>
                                @if($category->description)
                                    <p class="hidden md:block text-sm text-slate-600 leading-relaxed">{{ $category->description }}</p>
                                @endif
                            </div>
                            
                            <!-- Flecha indicadora -->
                            <div class="flex-shrink-0 text-slate-300 group-hover:text-indigo-500 group-hover:translate-x-1 transition-all duration-300">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    @if ($step === 2)
        <div class="fade-in">
            <button wire:click="$set('step', 1)" class="text-sm text-slate-500 hover:text-indigo-600 mb-6 flex items-center gap-2 font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Volver
            </button>

            <div class="text-center mb-8">
                <div class="inline-block p-2 bg-purple-100 rounded-full mb-3">
                    <span class="text-3xl">🔍</span>
                </div>
                <h2 class="text-3xl font-bold mb-2 text-slate-900">Cuéntanos un poco más...</h2>
                <p class="text-slate-500">Selecciona tu área específica</p>
            </div>

            <div class="space-y-3">
                @foreach ($subcategories as $sub)
                    <button wire:click="selectSubcategory({{ $sub->id }})" 
                            class="group w-full p-5 bg-gradient-to-r from-white to-slate-50 border-2 border-slate-200 rounded-xl hover:border-purple-500 hover:shadow-lg transition-all duration-300 flex justify-between items-center">
                        <span class="font-semibold text-slate-800 group-hover:text-purple-700">{{ $sub->name }}</span>
                        <svg class="w-5 h-5 text-slate-300 group-hover:text-purple-500 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    @if ($step === 3)
        <div class="fade-in">
            <div class="text-center mb-6 md:mb-8">
                <div class="inline-block p-2 bg-blue-100 rounded-full mb-3">
                    <span class="text-3xl">💼</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold mb-2 text-slate-900">¿Necesitas llevar tu equipo contigo?</h2>
                <p class="text-sm md:text-base text-slate-500">Elige según tu estilo de trabajo</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4">
                <button wire:click="selectMobility('LAPTOP')" class="group p-5 md:p-8 bg-gradient-to-br from-white to-blue-50 border-2 border-slate-200 rounded-2xl hover:border-blue-500 hover:shadow-xl hover:-translate-y-1 text-center transition-all duration-300">
                    <div class="text-4xl md:text-5xl mb-2 md:mb-4 group-hover:scale-110 transition-transform">💻</div>
                    <div class="font-bold text-base md:text-lg text-slate-800 mb-1 md:mb-2">Sí, Laptop</div>
                    <div class="text-xs md:text-sm text-slate-500">Necesito llevarla conmigo</div>
                </button>

                <button wire:click="selectMobility('DESKTOP')" class="group p-5 md:p-8 bg-gradient-to-br from-white to-indigo-50 border-2 border-slate-200 rounded-2xl hover:border-indigo-500 hover:shadow-xl hover:-translate-y-1 text-center transition-all duration-300">
                    <div class="text-4xl md:text-5xl mb-2 md:mb-4 group-hover:scale-110 transition-transform">🖥️</div>
                    <div class="font-bold text-base md:text-lg text-slate-800 mb-1 md:mb-2">No, PC Escritorio</div>
                    <div class="text-xs md:text-sm text-slate-500">Trabajaré en un lugar fijo</div>
                </button>

                <button wire:click="selectMobility('BOTH')" class="group p-5 md:p-8 bg-gradient-to-br from-white to-purple-50 border-2 border-slate-200 rounded-2xl hover:border-purple-500 hover:shadow-xl hover:-translate-y-1 text-center transition-all duration-300">
                    <div class="text-4xl md:text-5xl mb-2 md:mb-4 group-hover:scale-110 transition-transform">🤷</div>
                    <div class="font-bold text-base md:text-lg text-slate-800 mb-1 md:mb-2">Me da igual</div>
                    <div class="text-xs md:text-sm text-slate-500">Recomiéndame lo mejor</div>
                </button>
            </div>
        </div>
    @endif

    @if ($step === 4)
        <div class="fade-in">
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-full mb-4 shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span class="font-bold text-sm">¡Análisis Completado!</span>
                </div>
                <h2 class="text-4xl font-extrabold text-slate-900 mb-3">Tu Configuración Ideal</h2>
                <p class="text-slate-600">
                    Basado en tu perfil: 
                    <span class="font-bold text-indigo-600">
                        {{ \App\Models\Subcategory::find($selectedSubcategoryId)?->name }}
                    </span>
                </p>
            </div>

            <div class="bg-gradient-to-br from-slate-50 to-white rounded-2xl shadow-xl border-2 border-slate-200 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-3 md:p-4">
                    <h3 class="text-white font-bold text-base md:text-lg">📋 Especificaciones Recomendadas</h3>
                </div>
                
                <!-- Vista Desktop: Tabla -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-100">
                            <tr>
                                <th class="p-4 text-xs font-bold text-slate-600 uppercase tracking-wider">Componente</th>
                                <th class="p-4 text-xs font-bold text-slate-600 uppercase tracking-wider">Mínimo</th>
                                <th class="p-4 text-xs font-bold text-indigo-700 uppercase tracking-wider bg-indigo-50">Recomendado ⭐</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($recommendations as $rec)
                                <tr class="hover:bg-indigo-50/30 transition-colors">
                                    <td class="p-4">
                                        <div class="font-bold text-slate-800">{{ $rec->componentType->name }}</div>
                                        @if($rec->reason)
                                            <div class="text-xs text-slate-500 mt-1 italic">"{{ $rec->reason }}"</div>
                                        @endif
                                    </td>
                                    <td class="p-4 text-sm text-slate-600">
                                        {{ $rec->minSpec->name }}
                                    </td>
                                    <td class="p-4 text-sm font-bold text-indigo-700 bg-indigo-50/50">
                                        {{ $rec->recSpec->name }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-8 text-center text-slate-400">
                                        No hay recomendaciones específicas configuradas para este perfil todavía.
                                        <br>
                                        <span class="text-xs">¡Contacta a soporte!</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Vista Móvil: Cards -->
                <div class="md:hidden divide-y divide-slate-100">
                    @forelse ($recommendations as $rec)
                        <div class="p-4 hover:bg-indigo-50/30 transition-colors">
                            <div class="font-bold text-slate-800 mb-2 flex items-center gap-2">
                                <span class="text-indigo-600">•</span>
                                {{ $rec->componentType->name }}
                            </div>
                            @if($rec->reason)
                                <div class="text-xs text-slate-500 mb-3 italic pl-4">"{{ $rec->reason }}"</div>
                            @endif
                            <div class="pl-4 space-y-2">
                                <div class="flex items-start gap-2">
                                    <span class="text-xs font-semibold text-slate-500 min-w-[70px]">Mínimo:</span>
                                    <span class="text-sm text-slate-700">{{ $rec->minSpec->name }}</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-xs font-semibold text-indigo-600 min-w-[70px]">⭐ Ideal:</span>
                                    <span class="text-sm font-bold text-indigo-700">{{ $rec->recSpec->name }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-slate-400">
                            No hay recomendaciones específicas configuradas para este perfil todavía.
                            <br>
                            <span class="text-xs">¡Contacta a soporte!</span>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="text-center mb-8 bg-gradient-to-br from-yellow-50 to-amber-50 p-6 rounded-2xl border-2 border-yellow-200 shadow-lg">
                <p class="text-sm font-semibold text-yellow-800 mb-2">🔑 Tu código de referencia:</p>
                <p class="text-3xl font-mono font-extrabold text-slate-900 tracking-widest">{{ $trackingCode }}</p>
                <p class="text-xs text-yellow-700 mt-2">Guárdalo para cotizar por WhatsApp</p>
            </div>

            <h3 class="text-xl md:text-2xl font-bold text-center mb-6 text-slate-900">¿Cómo te gustaría proceder?</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                @foreach ($this->services as $service)
                    <button wire:click="selectServiceAndRedirect({{ $service->id }})" 
                        class="group block w-full text-left p-4 md:p-6 border-2 border-slate-200 rounded-2xl hover:border-green-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 bg-gradient-to-br from-white to-green-50">
                            
                            <div class="flex justify-between items-start mb-2 md:mb-3">
                                <span class="font-bold text-base md:text-lg text-slate-800 pr-2">{{ $service->name }}</span>
                                <span class="bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs md:text-sm font-bold px-2 md:px-3 py-1 md:py-1.5 rounded-lg shadow-md flex-shrink-0">
                                    S/ {{ number_format($service->price, 2) }}
                                </span>
                            </div>
                            
                            <p class="text-xs md:text-sm text-slate-600 mb-3 md:mb-4 line-clamp-2">{{ $service->description }}</p>
                            
                            <div class="flex items-center justify-center gap-2 w-full py-2.5 md:py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold text-sm md:text-base rounded-xl group-hover:from-green-600 group-hover:to-emerald-600 transition-all shadow-md">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                <span class="hidden sm:inline">Solicitar por WhatsApp</span>
                                <span class="sm:hidden">WhatsApp</span>
                            </div>
                        </button>
                @endforeach
            </div>

            <div class="text-center">
                <button wire:click="restart" class="inline-flex items-center gap-2 px-6 py-3 text-slate-600 hover:text-indigo-600 font-semibold rounded-xl hover:bg-slate-100 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Hacer otra consulta
                </button>
            </div>
        </div>
    @endif

</div>

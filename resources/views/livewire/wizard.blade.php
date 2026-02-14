<div>

    <div class="mb-8">
        <div class="h-2 w-full bg-slate-200 rounded-full overflow-hidden">
            <div class="h-full bg-indigo-600 transition-all duration-500 ease-out" 
                 style="width: {{ $step * 25 }}%"></div>
        </div>
        <p class="text-right text-xs text-slate-500 mt-1">Paso {{ $step }} de 4</p>
    </div>

    @if ($step === 1)
        <div class="fade-in">
            <h2 class="text-3xl font-bold text-center mb-2">¿Cuál será el uso principal?</h2>
            <p class="text-center text-slate-500 mb-8">Elige la opción que mejor te describa.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($categories as $category)
                    <button wire:click="selectCategory({{ $category->id }})" 
                            class="p-6 bg-white border-2 border-slate-200 rounded-xl hover:border-indigo-500 hover:bg-indigo-50 transition-all group text-left shadow-sm">
                        <h3 class="font-bold text-lg text-slate-800 group-hover:text-indigo-700">
                            {{ $category->name }}
                        </h3>
                        @if($category->description)
                            <p class="text-sm text-slate-400 mt-1">{{ $category->description }}</p>
                        @endif
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    @if ($step === 2)
        <div class="fade-in">
            <button wire:click="$set('step', 1)" class="text-sm text-slate-400 hover:text-slate-600 mb-4 flex items-center">
                ← Volver al inicio
            </button>

            <h2 class="text-2xl font-bold text-center mb-2">Profundicemos un poco...</h2>
            <p class="text-center text-slate-500 mb-8">Selecciona tu área específica.</p>

            <div class="space-y-3">
                @foreach ($subcategories as $sub)
                    <button wire:click="selectSubcategory({{ $sub->id }})" 
                            class="w-full p-4 bg-white border border-slate-200 rounded-lg hover:bg-indigo-50 hover:border-indigo-300 flex justify-between items-center transition-all shadow-sm">
                        <span class="font-medium">{{ $sub->name }}</span>
                        <span class="text-slate-300">→</span>
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    @if ($step === 3)
        <div class="fade-in">
            <h2 class="text-2xl font-bold text-center mb-6">¿Necesitas movilidad?</h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <button wire:click="selectMobility('LAPTOP')" class="p-6 bg-white border-2 border-slate-200 rounded-xl hover:border-indigo-500 text-center transition-all hover:shadow-md">
                    <div class="text-4xl mb-3">💻</div>
                    <div class="font-bold">Sí, Laptop</div>
                    <div class="text-xs text-slate-500 mt-1">Necesito llevarla conmigo</div>
                </button>

                <button wire:click="selectMobility('DESKTOP')" class="p-6 bg-white border-2 border-slate-200 rounded-xl hover:border-indigo-500 text-center transition-all hover:shadow-md">
                    <div class="text-4xl mb-3">🖥️</div>
                    <div class="font-bold">No, PC Escritorio</div>
                    <div class="text-xs text-slate-500 mt-1">Trabajaré en un lugar fijo</div>
                </button>

                <button wire:click="selectMobility('BOTH')" class="p-6 bg-white border-2 border-slate-200 rounded-xl hover:border-indigo-500 text-center transition-all hover:shadow-md">
                    <div class="text-4xl mb-3">🤷</div>
                    <div class="font-bold">Me da igual</div>
                    <div class="text-xs text-slate-500 mt-1">Recomiéndame lo mejor</div>
                </button>
            </div>
        </div>
    @endif

    @if ($step === 4)
        <div class="fade-in">
            <div class="text-center mb-8">
                <div class="inline-block p-2 bg-green-100 text-green-700 rounded-full mb-2 text-sm font-bold px-4">
                    ¡Análisis Completado!
                </div>
                <h2 class="text-3xl font-bold">Tu Configuración Ideal</h2>
                <p class="text-slate-500 mt-2">
                    Basado en tu perfil: 
                    <span class="font-semibold text-slate-800">
                        {{ \App\Models\Subcategory::find($selectedSubcategoryId)?->name }}
                    </span>
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden mb-8">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Componente</th>
                            <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Mínimo</th>
                            <th class="p-4 text-xs font-bold text-indigo-600 uppercase tracking-wider bg-indigo-50">Recomendado ⭐</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recommendations as $rec)
                            <tr class="hover:bg-slate-50">
                                <td class="p-4">
                                    <div class="font-bold text-slate-700">{{ $rec->componentType->name }}</div>
                                    @if($rec->reason)
                                        <div class="text-xs text-slate-400 mt-1 italic">"{{ $rec->reason }}"</div>
                                    @endif
                                </td>
                                <td class="p-4 text-sm text-slate-600">
                                    {{ $rec->minSpec->name }}
                                </td>
                                <td class="p-4 text-sm font-semibold text-indigo-700 bg-indigo-50/50">
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

            <div class="text-center mb-6 bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                <p class="text-sm text-yellow-800">Guarda tu código de referencia:</p>
                <p class="text-2xl font-mono font-bold text-slate-800 tracking-widest">{{ $trackingCode }}</p>
            </div>

            <h3 class="text-xl font-bold text-center mb-4">¿Cómo te gustaría proceder?</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                @foreach ($this->services as $service)
                    <button wire:click="selectServiceAndRedirect({{ $service->id }})" 
                        class="block w-full text-left p-4 border border-slate-200 rounded-xl hover:border-green-500 hover:bg-green-50 transition-all group">
                            
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-bold text-slate-700">{{ $service->name }}</span>
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-1 rounded">
                                    S/ {{ number_format($service->price, 2) }}
                                </span>
                            </div>
                            
                            <p class="text-sm text-slate-500 mb-3">{{ $service->description }}</p>
                            
                            <div class="text-center w-full py-2 bg-green-500 text-white font-bold rounded-lg group-hover:bg-green-600 transition-colors">
                                Solicitar por WhatsApp 💬
                            </div>
                        </button>
                @endforeach
            </div>

            <div class="text-center">
                <button wire:click="restart" class="text-slate-400 hover:text-slate-600 underline">
                    Hacer otra consulta
                </button>
            </div>
        </div>
    @endif

</div>
